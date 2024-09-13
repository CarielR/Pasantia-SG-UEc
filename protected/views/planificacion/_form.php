<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'planificacion-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

        
        
	<?php echo $form->errorSummary($model); ?>
        <div class="panel">       
<?php            //Parametrización de Busquedas y desplegues de Campos
	$criteriaDocente = new CDbCriteria;
	$criteriaDocente->order = 'doc_apellido ASC,doc_nombre ASC ';
	$docentes=Docente::model()->findAll($criteriaDocente); 
        
        ?>
                <?php echo "<h3>1.- Datos Generales</h3>"; ?>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_programa'); ?>
		<?php echo $form->textField($model, 'pla_programa', array('maxlength' => 100,'size' => 70)); ?>
		<?php echo $form->error($model,'pla_programa'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_nombre'); ?>
		<?php echo $form->textField($model, 'pla_nombre', array('maxlength' => 100,'size' => 70)); ?>
		<?php echo $form->error($model,'pla_nombre'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'tca_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tca_codigo', GxHtml::listDataEx(TipoCapacitacion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'tca_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_fecha_inicio'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha_inicio',
			'value' => $model->pla_fecha_inicio,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'pla_fecha_inicio'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_fecha_fin'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha_fin',
			'value' => $model->pla_fecha_fin,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'pla_fecha_fin'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_lugar'); ?>
		<?php echo $form->textField($model, 'pla_lugar', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'pla_lugar'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'tev_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tev_codigo', GxHtml::listDataEx(TipoEvento::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'tev_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_curso_codigo'); ?>
		<?php echo $form->textField($model, 'pla_curso_codigo', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'pla_curso_codigo'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_certificacion_presupuestaria'); ?>
		<?php echo $form->textField($model, 'pla_certificacion_presupuestaria', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'pla_certificacion_presupuestaria'); ?>
		</div><!-- row -->
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_instructivo'); ?>
		<?php echo $form->textField($model, 'pla_instructivo', array('maxlength' => 45,'size' => 45)); ?>
		<?php echo $form->error($model,'pla_instructivo'); ?>
		</div><!-- row -->
        </div>
        <div class="panel">
                <?php echo "<h3>2.- Académico</h3>"; ?>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_antecedentes'); ?>
		<?php echo $form->textArea($model, 'pla_antecedentes'); ?>
		<?php echo $form->error($model,'pla_antecedentes'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_objetivo'); ?>
		<?php echo $form->textField($model, 'pla_objetivo', array('maxlength' => 80,'size' => 80)); ?>
		<?php echo $form->error($model,'pla_objetivo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_metodologia'); ?>
		<?php echo $form->textArea($model, 'pla_metodologia'); ?>
		<?php echo $form->error($model,'pla_metodologia'); ?>
		</div><!-- row -->
        </div>
        <div class="panel"> 
                <?php echo "<h3>4.- Administrativo</h3>"; ?>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_presupuesto'); ?>
		<?php echo $form->textField($model, 'pla_presupuesto', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'pla_presupuesto'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_disposiciones'); ?>
		<?php echo $form->textArea($model, 'pla_disposiciones'); ?>
		<?php echo $form->error($model,'pla_disposiciones'); ?>
		</div><!-- row -->
        </div>
        <div class="panel">
                <?php echo "<h3>Firmas de Responsabilidad</h3>"; ?>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_firma_supervisado'); ?>
		<?php echo $form->textField($model, 'pla_firma_supervisado', array('maxlength' => 80,'size' => 80)); ?>
		<?php echo $form->error($model,'pla_firma_supervisado'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_pie_supervisado'); ?>
		<?php echo $form->textField($model, 'pla_pie_supervisado', array('maxlength' => 80,'size' => 80)); ?>
		<?php echo $form->error($model,'pla_pie_supervisado'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pla_fecha',
			'value' => $model->pla_fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'pla_fecha'); ?>
		</div><!-- row -->
	</div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('planificacion/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar y Registrar Detalles'));
$this->endWidget();
?>
</div><!-- form -->