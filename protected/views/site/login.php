<?php
$this->pageTitle=Yii::app()->name . ' - Acceso';
$this->breadcrumbs=array(
	'Acceso',
);
?>

<h1>Acceso</h1>

<p>Por favor llene el siguiente formulario con sus credenciales de acceso:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="panel">
    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	</div>
	<!-- 
    <div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>  -->

	<div class="row buttons">
		<?php echo CHtml::submitButton(' Acceso '); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
