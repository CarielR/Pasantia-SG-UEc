<div class="wide form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'grupos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
            <?php
                $claveCurso=$clave;
                $criteria = new CDbCriteria();
                $criteria->condition = "t.cur_codigo =$claveCurso";
            ?>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAll($criteria))); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div> 
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'gru_nombre'); ?>
		<?php echo $form->textField($model, 'gru_nombre', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'gru_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'gru_horario'); ?>
		<?php echo $form->textField($model, 'gru_horario', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'gru_horario'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Regresar'), array(
			'submit' => array('planificacion/opcionesPlanificacion')
		));
echo GxHtml::submitButton(Yii::t('app', 'Crear Grupo'), array(
			'submit' => array('grupos/createGrupos')
		));

//echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->

<div class="panel" align="center">
    <h3 align="center">Grupos asignados:</h3>
   <?php $ord=1;  if($reporte!=null){?>
   <table class="tabla_actividad" border="1" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center"><b>ORD.</b></td>
            <td align="center"><b>CURSO</b></td>
            <td align="center"><b>GRUPO</b></td>
            <td align="center"><b>HORARIO</b></td>
            <td align="center"><b>OPCION</b></td>
            <td></td>
	</tr>
   <?php foreach($reporte as $data)	{ ?>
    <tr>
	<td align="center"><?php echo $ord++;?></td>
        <td align="left"><?php echo $data['curso']?></td>
        <td align="left"><?php echo $data['nombre']?></td>        
        <td align="left"><?php echo $data['horario']?></td>
        <td align="center"><?php echo '<a href="/sg-uec/index.php?r=grupos/delete&id='.$data['codigoGrupo'].'"><img src="/sg-rad/images/delete.png" width="16" height="16" alt="Borrar"> </img></a>';?></td>
    </tr>
  <?php }  ?>

</table>
    <?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>
</div>
