<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_codigo'); ?>
		<?php echo $form->textField($model, 'emp_codigo'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_nombre'); ?>
		<?php echo $form->textField($model, 'emp_nombre', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_unidad'); ?>
		<?php echo $form->textField($model, 'emp_unidad', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_firma_jefe'); ?>
		<?php echo $form->textField($model, 'emp_firma_jefe', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_pie_jefe'); ?>
		<?php echo $form->textField($model, 'emp_pie_jefe', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_firma_docente'); ?>
		<?php echo $form->textField($model, 'emp_firma_docente', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_pie_docente'); ?>
		<?php echo $form->textField($model, 'emp_pie_docente', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_firma_director_espel'); ?>
		<?php echo $form->textField($model, 'emp_firma_director_espel', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_pie_director_espel'); ?>
		<?php echo $form->textField($model, 'emp_pie_director_espel', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_pie2_director_espel'); ?>
		<?php echo $form->textField($model, 'emp_pie2_director_espel', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_firma_aux'); ?>
		<?php echo $form->textField($model, 'emp_firma_aux', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'emp_pie_aux'); ?>
		<?php echo $form->textField($model, 'emp_pie_aux', array('maxlength' => 100,'size' => 80)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
