<div class="wide form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'inscripcion-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $model->curCodigo->cur_nombre; ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_codigo'); ?>
                <?php echo $model->parCodigo->par_apellido_participante.' '.$model->parCodigo->par_nombre_participante.' ( '.$model->parCodigo->par_cedula_participante.' )' ; ?>
		<?php echo $form->error($model,'per_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ein_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ein_codigo', GxHtml::listDataEx(EstadoInscripcion::model()->findAll('ein_codigo=2'))); ?> 
		<?php echo $form->error($model,'ein_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
            <!-- Registro Fecha Actual de la PC, valor por default de la caja de texto -->
		<?php echo $form->labelEx($model,'ins_fecha_pago_inscripcion'); ?>
		<?php echo $form->textField($model,'ins_fecha_pago_inscripcion',
			  		array('size'=>20, 'maxlength'=>20, 'value'=>date("Y-m-d H:i:s"),'readonly'=>'true')); ?>
		<?php echo $form->error($model,'ins_fecha_pago_inscripcion'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_pago_valor'); ?>
		<?php echo $form->textField($model, 'ins_pago_valor', array('maxlength' => 16,'readonly'=>'true','value'=>$costoInscripcion)); ?>
		<?php echo $form->error($model,'ins_pago_valor'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_factura_pago'); ?>
		<?php echo $form->textField($model, 'ins_factura_pago', array('maxlength' => 20,'style' => 'background-color:#FFFFE1')); ?>
		<?php echo $form->error($model,'ins_factura_pago'); ?>
                </div><!-- row -->
   </div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('inscripcion/adminPagoInscripcion')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->