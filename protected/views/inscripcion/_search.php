<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_codigo'); ?>
		<?php echo $form->textField($model, 'ins_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ein_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ein_codigo', GxHtml::listDataEx(EstadoInscripcion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'par_codigo'); ?>
		<?php echo $form->dropDownList($model, 'par_codigo', GxHtml::listDataEx(Participante::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'gru_codigo'); ?>
		<?php echo $form->dropDownList($model, 'gru_codigo', GxHtml::listDataEx(Grupos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_fecha_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'ins_fecha_inscripcion',
			'value' => $model->ins_fecha_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_factura_pago'); ?>
		<?php echo $form->textField($model, 'ins_factura_pago', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_pago_inscripcion'); ?>
		<?php echo $form->textField($model, 'ins_pago_inscripcion', array('maxlength' => 5,'size' => 5)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_fecha_pago_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'ins_fecha_pago_inscripcion',
			'value' => $model->ins_fecha_pago_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_pago_auditoria'); ?>
		<?php echo $form->textField($model, 'ins_pago_auditoria', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_pago_valor'); ?>
		<?php echo $form->textField($model, 'ins_pago_valor', array('maxlength' => 5,'size' => 5)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
