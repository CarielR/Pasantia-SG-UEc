<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_codigo'); ?>
		<?php echo $form->textField($model, 'pla_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tca_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tca_codigo', GxHtml::listDataEx(TipoCapacitacion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tev_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tev_codigo', GxHtml::listDataEx(TipoEvento::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_programa'); ?>
		<?php echo $form->textArea($model, 'pla_programa'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_nombre'); ?>
		<?php echo $form->textField($model, 'pla_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_fecha_inicio'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha_inicio',
			'value' => $model->pla_fecha_inicio,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_fecha_fin'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha_fin',
			'value' => $model->pla_fecha_fin,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_lugar'); ?>
		<?php echo $form->textField($model, 'pla_lugar', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_curso_codigo'); ?>
		<?php echo $form->textField($model, 'pla_curso_codigo', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_antecedentes'); ?>
		<?php echo $form->textArea($model, 'pla_antecedentes'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_objetivo'); ?>
		<?php echo $form->textField($model, 'pla_objetivo', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_metodologia'); ?>
		<?php echo $form->textArea($model, 'pla_metodologia'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_presupuesto'); ?>
		<?php echo $form->textField($model, 'pla_presupuesto', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_disposiciones'); ?>
		<?php echo $form->textArea($model, 'pla_disposiciones'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_firma_supervisado'); ?>
		<?php echo $form->textField($model, 'pla_firma_supervisado', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_pie_supervisado'); ?>
		<?php echo $form->textField($model, 'pla_pie_supervisado', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha',
			'value' => $model->pla_fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_creado_por'); ?>
		<?php echo $form->textField($model, 'pla_creado_por', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_fecha_creacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha_creacion',
			'value' => $model->pla_fecha_creacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_modificado_por'); ?>
		<?php echo $form->textField($model, 'pla_modificado_por', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_fecha_modificacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha_modificacion',
			'value' => $model->pla_fecha_modificacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

    	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_certificacion_presupuestaria'); ?>
		<?php echo $form->textField($model, 'pla_certificacion_presupuestaria', array('maxlength' => 45,'size' => 45)); ?>
	</div>

    
    	<div class="span-8 last">
		<?php echo $form->label($model, 'pla_instructivo'); ?>
		<?php echo $form->textField($model, 'pla_instructivo', array('maxlength' => 45,'size' => 45)); ?>
	</div>

        <div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
