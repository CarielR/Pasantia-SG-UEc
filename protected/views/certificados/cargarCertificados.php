<div class="wide form">
<?php 
    $this->menu = array(
		array('label'=>Yii::t('app', 'Regresar') . '',
			'url'=>array('site/index')),
	);    
    
    $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'carga-form',
	'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
    
    $nombres = new CDbCriteria;
    $nombres->order = 'par_apellido_participante';
    $nombres->select = 'par_codigo ,concat(par_apellido_participante,\'  \',par_nombre_participante) as par_apellido_participante';
    
    
?>
	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="panel">
            <div class="row">
		<?php echo $form->labelEx($model,'par_codigo'); ?>
		<?php echo $form->dropDownList($model, 'par_codigo', GxHtml::listDataEx(Participante::model()->findAll($nombres),'par_codigo','par_apellido_participante')); ?>                
		<?php echo $form->error($model,'par_codigo'); ?>
            </div>

            <div class="row">
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
                <?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listData($cursos,'cur_codigo','cur_nombre'),array('id' => 'id','style'=>'width: 500px')); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
            </div>
            
            <div class="span-8 last">
		<?php echo $form->labelEx($model,'cer_registro'); ?>
                <?php echo $form->textField($model, 'cer_registro'); ?>
		<?php echo $form->error($model,'cer_registro'); ?>
            </div><!-- row -->
            
            <div class="span-8 last">
		<?php echo $form->labelEx($model,'cer_nombre'); ?>
                <?php echo $form->fileField($model, 'cer_nombre'); ?>
		<?php echo $form->error($model,'cer_nombre'); ?>
            </div><!-- row -->
            
            <div class="span-8 last">
		<?php echo $form->labelEx($model,'cer_constancia'); ?>
                <?php echo $form->fileField($model, 'cer_constancia'); ?>
		<?php echo $form->error($model,'cer_constancia'); ?>
            </div><!-- row -->
            
            <div class="row">
		<?php echo $form->labelEx($model,'cer_fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'cer_fecha',
                'value' => $model->cer_fecha,
                'options' => array(
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'dateFormat' => 'yy-mm-dd',
                    ),
                ));?>
		<?php echo $form->error($model,'cer_fecha'); ?>
            </div>
            
        </div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
<?php
echo GxHtml::submitButton(Yii::t('app', ' Cargar Certificado'));
echo GxHtml::Button(Yii::t('app', 'Regresar'), array(
			'submit' => array('site/index')));
$this->endWidget();
?>
</div><!-- form -->