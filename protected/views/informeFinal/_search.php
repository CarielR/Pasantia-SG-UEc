<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_codigo'); ?>
		<?php echo $form->textField($model, 'inf_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tem_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tem_codigo', GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_codigo'); ?>
		<?php echo $form->dropDownList($model, 'doc_codigo', GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_nombre'); ?>
		<?php echo $form->textField($model, 'inf_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_fecha_entrega'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'inf_fecha_entrega',
			'value' => $model->inf_fecha_entrega,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_num_asistentes'); ?>
		<?php echo $form->textField($model, 'inf_num_asistentes'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_num_inscritos'); ?>
		<?php echo $form->textField($model, 'inf_num_inscritos'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_num_retirados'); ?>
		<?php echo $form->textField($model, 'inf_num_retirados'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_num_aprobados'); ?>
		<?php echo $form->textField($model, 'inf_num_aprobados'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_promedio_asistencia'); ?>
		<?php echo $form->textField($model, 'inf_promedio_asistencia', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_promedio_calificacion'); ?>
		<?php echo $form->textField($model, 'inf_promedio_calificacion', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_desarrollo'); ?>
		<?php echo $form->textArea($model, 'inf_desarrollo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_logros'); ?>
		<?php echo $form->textArea($model, 'inf_logros'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_conclusiones'); ?>
		<?php echo $form->textArea($model, 'inf_conclusiones'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'inf_recomendaciones'); ?>
		<?php echo $form->textArea($model, 'inf_recomendaciones'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
