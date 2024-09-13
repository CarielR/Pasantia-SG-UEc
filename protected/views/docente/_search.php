<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_codigo'); ?>
		<?php echo $form->textField($model, 'doc_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_cedula'); ?>
		<?php echo $form->textField($model, 'doc_cedula', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_nombre'); ?>
		<?php echo $form->textField($model, 'doc_nombre', array('maxlength' => 60,'size' => 60)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_apellido'); ?>
		<?php echo $form->textField($model, 'doc_apellido', array('maxlength' => 60,'size' => 60)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_siglas'); ?>
		<?php echo $form->textField($model, 'doc_siglas', array('maxlength' => 5,'size' => 5)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_titulo'); ?>
		<?php echo $form->textField($model, 'doc_titulo', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_correo'); ?>
		<?php echo $form->textField($model, 'doc_correo', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_telefono'); ?>
		<?php echo $form->textField($model, 'doc_telefono', array('maxlength' => 15,'size' => 15)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
