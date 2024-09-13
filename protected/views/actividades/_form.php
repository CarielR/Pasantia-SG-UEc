
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'actividades-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_codigo'); ?>
		<?php echo $form->dropDownList($model, 'con_codigo', GxHtml::listDataEx(Contenido::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'con_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_nombre'); ?>
		<?php echo $form->textField($model, 'act_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'act_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'act_fecha',
			'value' => $model->act_fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'act_fecha'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_horas_dictadas'); ?>
		<?php echo $form->textField($model, 'act_horas_dictadas', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'act_horas_dictadas'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_horas_act_docente'); ?>
		<?php echo $form->textField($model, 'act_horas_act_docente', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'act_horas_act_docente'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_horas_totales_docente'); ?>
		<?php echo $form->textField($model, 'act_horas_totales_docente', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'act_horas_totales_docente'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_valor_pagar'); ?>
		<?php echo $form->textField($model, 'act_valor_pagar', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'act_valor_pagar'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_valor_total'); ?>
		<?php echo $form->textField($model, 'act_valor_total', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'act_valor_total'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('actividades/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->