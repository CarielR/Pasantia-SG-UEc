<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'not_codigo'); ?>
		<?php echo $form->textField($model, 'not_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'ins_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ins_codigo', GxHtml::listDataEx(Inscripcion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'not_nota1'); ?>
		<?php echo $form->textField($model, 'not_nota1', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'not_nota2'); ?>
		<?php echo $form->textField($model, 'not_nota2', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'not_final'); ?>
		<?php echo $form->textField($model, 'not_final', array('maxlength' => 10,'size' => 10)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'not_observacion'); ?>
		<?php echo $form->textField($model, 'not_observacion', array('maxlength' => 45,'size' => 45)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
