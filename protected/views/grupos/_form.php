<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'grupos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'gru_nombre'); ?>
		<?php echo $form->textField($model, 'gru_nombre', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'gru_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'gru_horario'); ?>
		<?php echo $form->textField($model, 'gru_horario', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'gru_horario'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('grupos/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->