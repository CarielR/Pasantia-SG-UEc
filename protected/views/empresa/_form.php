
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'empresa-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_nombre'); ?>
		<?php echo $form->textField($model, 'emp_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_unidad'); ?>
		<?php echo $form->textField($model, 'emp_unidad', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_unidad'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_firma_jefe'); ?>
		<?php echo $form->textField($model, 'emp_firma_jefe', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_firma_jefe'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_pie_jefe'); ?>
		<?php echo $form->textField($model, 'emp_pie_jefe', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_pie_jefe'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_firma_docente'); ?>
		<?php echo $form->textField($model, 'emp_firma_docente', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_firma_docente'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_pie_docente'); ?>
		<?php echo $form->textField($model, 'emp_pie_docente', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_pie_docente'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_firma_director_espel'); ?>
		<?php echo $form->textField($model, 'emp_firma_director_espel', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_firma_director_espel'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_pie_director_espel'); ?>
		<?php echo $form->textField($model, 'emp_pie_director_espel', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_pie_director_espel'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_pie2_director_espel'); ?>
		<?php echo $form->textField($model, 'emp_pie2_director_espel', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_pie2_director_espel'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_firma_aux'); ?>
		<?php echo $form->textField($model, 'emp_firma_aux', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_firma_aux'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'emp_pie_aux'); ?>
		<?php echo $form->textField($model, 'emp_pie_aux', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'emp_pie_aux'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('empresa/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->