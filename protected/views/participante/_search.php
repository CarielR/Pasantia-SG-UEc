<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_codigo'); ?>
		<?php echo $form->textField($model, 'par_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_nombre_participante'); ?>
		<?php echo $form->textField($model, 'par_nombre_participante', array('maxlength' => 60,'size' => 60)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_apellido_participante'); ?>
		<?php echo $form->textField($model, 'par_apellido_participante', array('maxlength' => 60,'size' => 60)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_cedula_participante'); ?>
		<?php echo $form->textField($model, 'par_cedula_participante', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_tipo_participante'); ?>
		<?php echo $form->textField($model, 'par_tipo_participante', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_correo_participante'); ?>
		<?php echo $form->textField($model, 'par_correo_participante', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_celular'); ?>
		<?php echo $form->textField($model, 'par_celular', array('maxlength' => 15,'size' => 15)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_convencional'); ?>
		<?php echo $form->textField($model, 'par_convencional', array('maxlength' => 15,'size' => 15)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_domicilio'); ?>
		<?php echo $form->textField($model, 'par_domicilio', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_fecha_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'par_fecha_inscripcion',
			'value' => $model->par_fecha_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_nombre_repre'); ?>
		<?php echo $form->textField($model, 'par_nombre_repre', array('maxlength' => 60,'size' => 60)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_apellido_repre'); ?>
		<?php echo $form->textField($model, 'par_apellido_repre', array('maxlength' => 60,'size' => 60)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_cedula_repre'); ?>
		<?php echo $form->textField($model, 'par_cedula_repre', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
