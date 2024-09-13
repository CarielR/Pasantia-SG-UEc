<?php
$this->breadcrumbs = array(
	//'Planificacions' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Planificaciones', 'url'=>array('adminPlanificacion')),
        //array('label'=>Yii::t('app', 'Actualizar') . ' Curso', 'url'=>array('updateCurso', 'id' => $model->pla_codigo)),
        //array('label'=>Yii::t('app', 'Actualizar') . ' Objetivos Específicos', 'url'=>array('updateObjetivos', 'id' => $model->pla_codigo)),
        //array('label'=>Yii::t('app', 'Actualizar') . ' Grupos', 'url'=>array('updateGrupos', 'id' => $model->pla_codigo)),
	//array('label'=>Yii::t('app', 'Borrar') . ' Planificacion', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->pla_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Planificacion', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('app', 'Planificaciones Registradas'); ?></h3>

<p style="display:none">
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="wide form">
<br/>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'reporte-form',
	'enableAjaxValidation' => true,
));
?>



<?php echo $form->errorSummary($model); ?>
	<div class="panel">
        <div class="span-8 last">
		<?php echo $form->labelEx($model,'Planificaciones: '); ?>
		<?php echo $form->dropDownList($model, 'pla_codigo', GxHtml::listDataEx(Planificacion::model()->findAll())); ?>
		<?php echo $form->error($model,'pla_codigo'); ?>
        </div>
            <br/>
        <div class="span-8 last" align="center">
		<?php echo GxHtml::submitButton(Yii::t('app', ' Actualizar Consulta '));
		$this->endWidget();
		?>
        </div>
	</div>
</div>  

<!-- TABLA DE DATOS DESPLEGADOS -->
<br />
<div class="reporte">
<?php $ord=1;?>  
<?php if($reporte!=null){ ?>
<table border="1" class="tabla_reporte">
	<tr>
            <th>ORD.</th>
            <th>PROGRAMA</th>
            <th>CURSO</th>
            <th>FECHA</th>
            <th>T. CAPACITACION</th>
            <th>T. EVENTO</th>
	</tr>
	<?php foreach($reporte as $data)	{ ?>
	<tr>
	<td align="center"><?php echo $ord++;?></td>
        <td align="left"><?php echo $data['programa']?></td>
        <td align="left"><?php echo $data['curso']?></td>
        <td align="left"><?php echo $data['fecha']?></td>
        <td align="left"><?php echo $data['tipoCapacitacion']?></td>        
        <td align="left"><?php echo $data['tipoEvento']?></td>
  </tr>
	<?php } echo "<br/>* Dar clic en los botones para registrar los detalles";        
        ?>
</table>
<?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>

</div>


<h4><a href="doc/InstruccionesPlanificacion.pdf" target="_blank" >Instrucciones para la creación de Planificaciones</a></h4>