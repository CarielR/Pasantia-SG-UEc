<?php
$this->breadcrumbs = array(
	//'Inscripcions' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Crear') . ' Inscripción', 'url'=>array('createInscripcion')),
);
?>

<h3><?php echo Yii::t('app', 'Inscripciones del Participante'); ?></h3>

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
                <?php     $criteria = new CDbCriteria;
			  $criteria->select = 't.par_codigo,concat(par_nombre_participante,\'  \',par_apellido_participante) as par_apellido_participante'; 
                          $criteria->addCondition('t.par_cedula_participante = '.Yii::app()->user->name.';'); ?>
		<?php echo $form->labelEx($model,'Participante: '); ?>
		<?php echo $form->dropDownList($model, 'par_persona', GxHtml::listDataEx(Participante::model()->findAll($criteria),'par_codigo','par_apellido_participante')); ?>
		<?php echo $form->error($model,'par_persona'); ?>
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
            <th>CURSO</th>
            <th>PARTICIPANTE</th>
            <th>FECHA INS.</th>
            <th>ESTADO INS.</th>
            <th>VALOR</th>
            <th>IMPRIMIR</th>
	</tr>
	<?php foreach($reporte as $data)	{ ?>
	<tr>
	<td align="center"><?php echo $ord++;?></td>
        <td align="left"><?php echo $data['curso']?></td>
        <td align="left"><?php echo $data['participante']?></td>
        <td align="left"><?php echo $data['fecha']?></td>
        <td align="left"><?php echo $data['estado']?></td>        
        <td align="left"><?php echo $data['valor']?></td>
        <td align="center"><?php echo '<a href="/sg-uec/index.php?r=inscripcion/imprimir&id='.$data['codigoInscripcion'].'"><img src="/sg-uec/images/print.png" width="16" height="16" alt="Imprimir"> </img></a>';?></td>
  </tr>
	<?php } echo "<br/>* REGISTRADO: Habilitado para ir a cancelar la inscripción en la Unidad de Finanzas ubicada en el campus Latacunga - Centro.";        
                echo "<br/>* INSCRITO: Hablitado en lista para el curso.";        
        ?>
</table>
<?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>

</div>

