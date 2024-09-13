
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'temario-form',
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
		<?php echo $form->labelEx($model,'doc_codigo'); ?>
		<?php echo $form->dropDownList($model, 'doc_codigo', GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'doc_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_nombre'); ?>
		<?php echo $form->textField($model, 'tem_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'tem_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_fecha_inicio'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tem_fecha_inicio',
			'value' => $model->tem_fecha_inicio,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'tem_fecha_inicio'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_fecha_fin'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tem_fecha_fin',
			'value' => $model->tem_fecha_fin,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'tem_fecha_fin'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_valor_clases'); ?>
		<?php echo $form->textField($model, 'tem_valor_clases', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'tem_valor_clases'); ?>
                </div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('temario/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->