
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'tipo-evento-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tev_nombre'); ?>
		<?php echo $form->textField($model, 'tev_nombre', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'tev_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tev_estado'); ?>
		<?php echo $form->checkBox($model, 'tev_estado'); ?>
		<?php echo $form->error($model,'tev_estado'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('tipoevento/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->