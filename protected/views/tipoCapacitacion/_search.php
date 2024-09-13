<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tca_codigo'); ?>
		<?php echo $form->textField($model, 'tca_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tca_nombre'); ?>
		<?php echo $form->textField($model, 'tca_nombre', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'tca_estado'); ?>
		<?php echo $form->dropDownList($model, 'tca_estado', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->