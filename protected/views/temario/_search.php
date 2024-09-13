<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tem_codigo'); ?>
		<?php echo $form->textField($model, 'tem_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_codigo'); ?>
		<?php echo $form->dropDownList($model, 'pla_codigo', GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'doc_codigo'); ?>
		<?php echo $form->dropDownList($model, 'doc_codigo', GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tem_nombre'); ?>
		<?php echo $form->textField($model, 'tem_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tem_fecha_inicio'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tem_fecha_inicio',
			'value' => $model->tem_fecha_inicio,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tem_fecha_fin'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tem_fecha_fin',
			'value' => $model->tem_fecha_fin,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>
        <div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_valor_clases'); ?>
		<?php echo $form->textField($model, 'tem_valor_clases', array('maxlength' => 10,'size' => 10)); ?>
        </div><!-- row -->

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
