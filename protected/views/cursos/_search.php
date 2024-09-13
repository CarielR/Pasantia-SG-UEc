<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_codigo'); ?>
		<?php echo $form->textField($model, 'cur_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_codigo'); ?>
		<?php echo $form->dropDownList($model, 'pla_codigo', GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_nombre'); ?>
		<?php echo $form->textField($model, 'cur_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_descripcion'); ?>
		<?php echo $form->textArea($model, 'cur_descripcion'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_fecha_planificacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_planificacion',
			'value' => $model->cur_fecha_planificacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_codigo_curso'); ?>
		<?php echo $form->textField($model, 'cur_codigo_curso', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_objetivo'); ?>
		<?php echo $form->textArea($model, 'cur_objetivo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_duracion'); ?>
		<?php echo $form->textField($model, 'cur_duracion', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_dirigido'); ?>
		<?php echo $form->textField($model, 'cur_dirigido', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_participantes'); ?>
		<?php echo $form->textField($model, 'cur_participantes'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_costo'); ?>
		<?php echo $form->textField($model, 'cur_costo', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_fecha_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_inscripcion',
			'value' => $model->cur_fecha_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_nota_aprob'); ?>
		<?php echo $form->textField($model, 'cur_nota_aprob', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_asistencia_aprob'); ?>
		<?php echo $form->textField($model, 'cur_asistencia_aprob', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_observaciones'); ?>
		<?php echo $form->textArea($model, 'cur_observaciones'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_estado'); ?>
		<?php echo $form->dropDownList($model, 'cur_estado', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_firma_realiza'); ?>
		<?php echo $form->textField($model, 'cur_firma_realiza', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_pie_firma'); ?>
		<?php echo $form->textField($model, 'cur_pie_firma', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_creado_por'); ?>
		<?php echo $form->textField($model, 'cur_creado_por', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_fecha_creacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_creacion',
			'value' => $model->cur_fecha_creacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_modificado_por'); ?>
		<?php echo $form->textField($model, 'cur_modificado_por', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_fecha_modificacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_modificacion',
			'value' => $model->cur_fecha_modificacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
