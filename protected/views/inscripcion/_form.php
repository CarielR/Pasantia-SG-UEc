
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'inscripcion-form',
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
		<?php echo $form->labelEx($model,'ein_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ein_codigo', GxHtml::listDataEx(EstadoInscripcion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'ein_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_codigo'); ?>
		<?php echo $form->dropDownList($model, 'par_codigo', GxHtml::listDataEx(Participante::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'par_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'gru_codigo'); ?>
		<?php echo $form->dropDownList($model, 'gru_codigo', GxHtml::listDataEx(Grupos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'gru_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_fecha_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'ins_fecha_inscripcion',
			'value' => $model->ins_fecha_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'ins_fecha_inscripcion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_factura_pago'); ?>
		<?php echo $form->textField($model, 'ins_factura_pago', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'ins_factura_pago'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_pago_inscripcion'); ?>
		<?php echo $form->textField($model, 'ins_pago_inscripcion', array('maxlength' => 5,'size' => 5)); ?>
		<?php echo $form->error($model,'ins_pago_inscripcion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_fecha_pago_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'ins_fecha_pago_inscripcion',
			'value' => $model->ins_fecha_pago_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'ins_fecha_pago_inscripcion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_pago_auditoria'); ?>
		<?php echo $form->textField($model, 'ins_pago_auditoria', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'ins_pago_auditoria'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_pago_valor'); ?>
		<?php echo $form->textField($model, 'ins_pago_valor', array('maxlength' => 5,'size' => 5)); ?>
		<?php echo $form->error($model,'ins_pago_valor'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('inscripcion/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->