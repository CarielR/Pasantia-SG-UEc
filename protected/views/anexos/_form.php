
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'anexos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_codigo'); ?>
		<?php echo $form->dropDownList($model, 'pla_codigo', GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'pla_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ane_nombre'); ?>
		<?php echo $form->textField($model, 'ane_nombre', array('maxlength' => 60,'size' => 60)); ?>
		<?php echo $form->error($model,'ane_nombre'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('anexos/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->