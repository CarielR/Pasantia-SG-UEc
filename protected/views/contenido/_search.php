<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'con_codigo'); ?>
		<?php echo $form->textField($model, 'con_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tem_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tem_codigo', GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'con_nombre'); ?>
		<?php echo $form->textField($model, 'con_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'con_horas_planificadas'); ?>
		<?php echo $form->textField($model, 'con_horas_planificadas', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'con_horas_act_planifcadas'); ?>
		<?php echo $form->textField($model, 'con_horas_act_planifcadas', array('maxlength' => 10,'size' => 10)); ?>
	</div>
	
	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
