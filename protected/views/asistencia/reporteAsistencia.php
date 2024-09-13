<?php
$this->breadcrumbs = array(
	//'Reportes' => array('index'),
	Yii::t('app', 'Lista de Participantes Inscritos'),
);

 $this->menu = array(array('label' => 'Imprimir','url' => '#',
                     'linkOptions' => array('submit' => array('reporteAsistenciaPdf'),
                         'params'=>array(   'model' => base64_encode(serialize($model)),
                                            'reporte' => base64_encode(serialize($reporte))))),   
     );
?>

<h3><?php echo Yii::t('app', 'Lista de Participantes Inscritos'); ?></h3>

<p style="display:none">
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="wide form">
<br/>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'inscripcion-form',
	'enableAjaxValidation' => false,
));
?>

<?php echo $form->errorSummary($model); ?>
	<div class="panel">
	<br/>
    <table border="0">
    	<tr><td>
         <div class="span-8 last">
                    <?php //Cargar Bombo Box con cursos activos
                        $cursos = new CDbCriteria;
                        $cursos->condition = 'cur_estado=1'; ?>
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->dropDownList($model,'cur_codigo',CHtml::listData(Cursos::model()->findAll($cursos),'cur_codigo','cur_nombre'),
                        array('ajax' => array('type' => 'POST',
                            'url' => CController::createUrl('Grupos/cargarGruposReporte'),
                            'update' => '#Parametros_gru_codigo','data'=>array('miCurso'=>'js:this.value') ),
                            'prompt' => 'Seleccione un Curso' )); ?>
                <?php //echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div><!-- row -->
		</td><td rowspan="2">
        <div class="span-8 last">
         <?php echo $form->radioButtonList($model,'par_opcion',array('listaSimple'=>'Asistencia Diaria','cartillaAsistencia'=>'Evaluación de Asistencia','cartillaNotas'=>'Cart. Notas'),array('labelOptions'=>array('style'=>'display:inline'))); ?>
        <?php echo $form->error($model,'par_opcion'); ?>
        </div>
        </td>
        </tr>
        <tr><td>
                <?php echo $form->labelEx($model,'gru_codigo'); ?>
                <?php if ($model->isNewRecord>1) {
                            echo $form->dropDownList($model,'gru_codigo',
                            array('0' => 'Seleccione un Grupo'));
			}else{
                            $curso=$model->cur_codigo;
                            
                            $sql="select count(gru_codigo) as total from grupos where cur_codigo='$curso';";
                            $connection=Yii::app()->db;
                            $command=$connection->createCommand($sql);
                            $row=$command->queryRow();
                            $bandera=$row['total'];
                            if ($bandera==0) {
                                    echo $form->dropDownList($model,'gru_codigo',
                                    array('0' => 'Seleccione un Grupo')); 
                            } else {
                                    echo $form->dropDownList($model,'gru_codigo',
                                    CHtml::listData(Grupos::model()->findAllBySql(
                                    "select * from grupos where cur_codigo=:keyword order by gru_nombre=:clave2 asc",
                                    array(':keyword'=>$model->cur_codigo,':clave2'=>$model->gru_codigo)),
                                    'gru_codigo','gru_nombre'));
                            }
	 		}?>
                    <?php echo $form->error($model,'gru_codigo'); ?>
                    </div><!-- row -->
        </td>
        </tr>
        <tr><td align="center">
       	<?php
		echo GxHtml::submitButton(Yii::t('app', ' Actualizar Consulta '));
		$this->endWidget();
		?>
        </td><td>
        </td><td>
        </td><td>
        </td></tr>
        </table>
</div>
</div>  

<!-- TABAL DE DATOS DESPLEGADOS -->
<br />
<div class="reporte">
<?php $ord=1;?>  
<?php if($reporte!=null){ ?>
<table border="1" class="tabla_reporte">
	<tr>
    	<th>ORD.</th>
        <th>APELLIDOS Y NOMBRES</th>
        <th>Nº CEDULA</th>
        <?php if($model->par_opcion=='listaSimple') {?>
            <th>FIRMA</th>
        <?php }elseif($model->par_opcion=='cartillaAsistencia'){ ?>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <th>_</th>
        <?php }elseif($model->par_opcion=='cartillaNotas'){ ?>
        <th>NOTA 1</th>
        <th>NOTA 2</th>
        <th>PROME</th>
        <th>FINAL</th>
        <?php }?>
	</tr>
	<?php foreach($reporte as $data)	{ ?>
	<tr>
            <td align="center"><?php echo $ord++;?></td>
            <td><?php echo $data->parCodigo->par_apellido_participante.' '.$data->parCodigo->par_nombre_participante?></td>
            <td align="center"><?php echo $data->parCodigo->par_cedula_participante?></td>
    	<?php if($model->par_opcion=='listaSimple') {?>
        <td align="center"><?php echo "____________________"?></td>
        <?php }elseif($model->par_opcion=='cartillaAsistencia'){ ?>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <?php }elseif($model->par_opcion=='cartillaNotas'){ ?>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <?php }?>
  </tr>
	<?php } ?>
</table>
<?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>

</div>
