<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certificados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'par_codigo'); ?>
		<?php echo $form->textField($model,'par_codigo'); ?>
		<?php echo $form->error($model,'par_codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->textField($model,'cur_codigo'); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_nombre'); ?>
		<?php echo $form->textField($model,'cer_nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'cer_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_fecha'); ?>
		<?php echo $form->textField($model,'cer_fecha'); ?>
		<?php echo $form->error($model,'cer_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cer_carga_usuario'); ?>
		<?php echo $form->textField($model,'cer_carga_usuario',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'cer_carga_usuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->