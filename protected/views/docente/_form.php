
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'docente-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_cedula'); ?>
		<?php echo $form->textField($model, 'doc_cedula', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'doc_cedula'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_nombre'); ?>
		<?php echo $form->textField($model, 'doc_nombre', array('maxlength' => 60,'size' => 60)); ?>
		<?php echo $form->error($model,'doc_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_apellido'); ?>
		<?php echo $form->textField($model, 'doc_apellido', array('maxlength' => 60,'size' => 60)); ?>
		<?php echo $form->error($model,'doc_apellido'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_siglas'); ?>
		<?php echo $form->textField($model, 'doc_siglas', array('maxlength' => 5,'size' => 5)); ?>
		<?php echo $form->error($model,'doc_siglas'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_titulo'); ?>
		<?php echo $form->textField($model, 'doc_titulo', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'doc_titulo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_correo'); ?>
		<?php echo $form->textField($model, 'doc_correo', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'doc_correo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'doc_telefono'); ?>
		<?php echo $form->textField($model, 'doc_telefono', array('maxlength' => 15,'size' => 15)); ?>
		<?php echo $form->error($model,'doc_telefono'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('docente/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->