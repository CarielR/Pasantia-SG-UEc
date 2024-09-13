<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cer_codigo'); ?>
		<?php echo $form->textField($model,'cer_codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'par_codigo'); ?>
		<?php echo $form->textField($model,'par_codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_codigo'); ?>
		<?php echo $form->textField($model,'cur_codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_nombre'); ?>
		<?php echo $form->textField($model,'cer_nombre',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_fecha'); ?>
		<?php echo $form->textField($model,'cer_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cer_carga_usuario'); ?>
		<?php echo $form->textField($model,'cer_carga_usuario',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->