
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'notas-form',
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
		<?php echo $form->labelEx($model,'ins_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ins_codigo', GxHtml::listDataEx(Inscripcion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'ins_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'not_nota1'); ?>
		<?php echo $form->textField($model, 'not_nota1', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'not_nota1'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'not_nota2'); ?>
		<?php echo $form->textField($model, 'not_nota2', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'not_nota2'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'not_final'); ?>
		<?php echo $form->textField($model, 'not_final', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'not_final'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'not_observacion'); ?>
		<?php echo $form->textField($model, 'not_observacion', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'not_observacion'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('notas/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->