
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cursos-form',
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
		<?php echo $form->labelEx($model,'cur_nombre'); ?>
		<?php echo $form->textField($model, 'cur_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'cur_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_descripcion'); ?>
		<?php echo $form->textArea($model, 'cur_descripcion'); ?>
		<?php echo $form->error($model,'cur_descripcion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_fecha_planificacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_planificacion',
			'value' => $model->cur_fecha_planificacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'cur_fecha_planificacion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_codigo_curso'); ?>
		<?php echo $form->textField($model, 'cur_codigo_curso', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_codigo_curso'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_objetivo'); ?>
		<?php echo $form->textArea($model, 'cur_objetivo'); ?>
		<?php echo $form->error($model,'cur_objetivo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_duracion'); ?>
		<?php echo $form->textField($model, 'cur_duracion', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_duracion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_dirigido'); ?>
		<?php echo $form->textField($model, 'cur_dirigido', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'cur_dirigido'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_participantes'); ?>
		<?php echo $form->textField($model, 'cur_participantes'); ?>
		<?php echo $form->error($model,'cur_participantes'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_costo'); ?>
		<?php echo $form->textField($model, 'cur_costo', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'cur_costo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_fecha_inscripcion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_inscripcion',
			'value' => $model->cur_fecha_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'cur_fecha_inscripcion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_nota_aprob'); ?>
		<?php echo $form->textField($model, 'cur_nota_aprob', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'cur_nota_aprob'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_asistencia_aprob'); ?>
		<?php echo $form->textField($model, 'cur_asistencia_aprob', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_asistencia_aprob'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_observaciones'); ?>
		<?php echo $form->textArea($model, 'cur_observaciones'); ?>
		<?php echo $form->error($model,'cur_observaciones'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_estado'); ?>
		<?php echo $form->checkBox($model, 'cur_estado'); ?>
		<?php echo $form->error($model,'cur_estado'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_firma_realiza'); ?>
		<?php echo $form->textField($model, 'cur_firma_realiza', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_firma_realiza'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_pie_firma'); ?>
		<?php echo $form->textField($model, 'cur_pie_firma', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_pie_firma'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_creado_por'); ?>
		<?php echo $form->textField($model, 'cur_creado_por', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_creado_por'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_fecha_creacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_creacion',
			'value' => $model->cur_fecha_creacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'cur_fecha_creacion'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_modificado_por'); ?>
		<?php echo $form->textField($model, 'cur_modificado_por', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'cur_modificado_por'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'cur_fecha_modificacion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'cur_fecha_modificacion',
			'value' => $model->cur_fecha_modificacion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'cur_fecha_modificacion'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('cursos/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->