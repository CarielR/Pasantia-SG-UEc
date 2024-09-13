<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'informe-final-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

        <?php 
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.cur_codigo =".$model->cur_codigo);
        ?>
        
	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAll($criteria))); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'inf_nombre'); ?>
		<?php echo $form->textField($model, 'inf_nombre', array('maxlength' => 100,'size' => 80, 'readonly'=> true)); ?>
		<?php echo $form->error($model,'inf_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'inf_fecha_entrega'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'inf_fecha_entrega',
			'value' => $model->inf_fecha_entrega,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'inf_fecha_entrega'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'inf_desarrollo'); ?>
		<?php echo $form->textArea($model, 'inf_desarrollo'); ?>
		<?php echo $form->error($model,'inf_desarrollo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'inf_logros'); ?>
		<?php echo $form->textArea($model, 'inf_logros'); ?>
		<?php echo $form->error($model,'inf_logros'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'inf_conclusiones'); ?>
		<?php echo $form->textArea($model, 'inf_conclusiones'); ?>
		<?php echo $form->error($model,'inf_conclusiones'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'inf_recomendaciones'); ?>
		<?php echo $form->textArea($model, 'inf_recomendaciones'); ?>
		<?php echo $form->error($model,'inf_recomendaciones'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('temario/adminTemario')
		));
echo GxHtml::submitButton(Yii::t('app', 'Registrar'));
$this->endWidget();
?>
</div><!-- form -->