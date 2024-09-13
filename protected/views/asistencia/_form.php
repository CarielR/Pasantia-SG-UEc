
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'asistencia-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ins_codigo', GxHtml::listDataEx(Inscripcion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'ins_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'asi_porcentaje'); ?>
		<?php echo $form->textField($model, 'asi_porcentaje', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'asi_porcentaje'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'asi_observacion'); ?>
		<?php echo $form->textField($model, 'asi_observacion', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'asi_observacion'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('asistencia/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->