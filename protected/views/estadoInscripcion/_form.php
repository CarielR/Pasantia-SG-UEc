
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'estado-inscripcion-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ein_nombre'); ?>
		<?php echo $form->textField($model, 'ein_nombre', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'ein_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ein_estado'); ?>
		<?php echo $form->checkBox($model, 'ein_estado'); ?>
		<?php echo $form->error($model,'ein_estado'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('estadoinscripcion/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->