
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'contenido-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tem_codigo', GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'tem_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_nombre'); ?>
		<?php echo $form->textField($model, 'con_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'con_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_horas_planificadas'); ?>
		<?php echo $form->textField($model, 'con_horas_planificadas', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'con_horas_planificadas'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_horas_act_planificadas'); ?>
		<?php echo $form->textField($model, 'con_horas_act_planificadas', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'con_horas_act_planificadas'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('contenido/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->