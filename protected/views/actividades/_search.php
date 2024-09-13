<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_codigo'); ?>
		<?php echo $form->textField($model, 'act_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'con_codigo'); ?>
		<?php echo $form->dropDownList($model, 'con_codigo', GxHtml::listDataEx(Contenido::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_nombre'); ?>
		<?php echo $form->textField($model, 'act_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'act_fecha',
			'value' => $model->act_fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_horas_dictadas'); ?>
		<?php echo $form->textField($model, 'act_horas_dictadas', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_horas_act_docente'); ?>
		<?php echo $form->textField($model, 'act_horas_act_docente', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_horas_totales_docente'); ?>
		<?php echo $form->textField($model, 'act_horas_totales_docente', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_valor_pagar'); ?>
		<?php echo $form->textField($model, 'act_valor_pagar', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'act_valor_total'); ?>
		<?php echo $form->textField($model, 'act_valor_total', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
