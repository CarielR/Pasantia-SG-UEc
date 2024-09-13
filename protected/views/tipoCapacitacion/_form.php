
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'tipo-capacitacion-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tca_nombre'); ?>
		<?php echo $form->textField($model, 'tca_nombre', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'tca_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tca_estado'); ?>
		<?php echo $form->checkBox($model, 'tca_estado'); ?>
		<?php echo $form->error($model,'tca_estado'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('tipocapacitacion/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->