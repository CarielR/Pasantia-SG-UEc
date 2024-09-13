
<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'participante-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="panel">
            <?php echo "<h3>Datos del Participante</h3>"; ?>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_nombre_participante'); ?>
		<?php echo $form->textField($model, 'par_nombre_participante', array('maxlength' => 60,'size' => 40,'style' => 'text-transform: uppercase')); ?>
		<?php echo $form->error($model,'par_nombre_participante'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_apellido_participante'); ?>
		<?php echo $form->textField($model, 'par_apellido_participante', array('maxlength' => 60,'size' => 40,'style' => 'text-transform: uppercase')); ?>
		<?php echo $form->error($model,'par_apellido_participante'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_cedula_participante'); ?>
		<?php echo $form->textField($model, 'par_cedula_participante', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'par_cedula_participante'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_tipo_participante'); ?>
		<?php echo $form->dropdownList($model, 'par_tipo_participante', array('INTERNO' => 'INTERNO (ESPE)', 'EXTERNO' => 'EXTERNO')); ?>
		<?php echo $form->error($model,'par_tipo_participante'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_correo_participante'); ?>
		<?php echo $form->textField($model, 'par_correo_participante', array('maxlength' => 80,'size' => 40)); ?>
		<?php echo $form->error($model,'par_correo_participante'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_celular'); ?>
		<?php echo $form->textField($model, 'par_celular', array('maxlength' => 15,'size' => 15)); ?>
		<?php echo $form->error($model,'par_celular'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_convencional'); ?>
		<?php echo $form->textField($model, 'par_convencional', array('maxlength' => 15,'size' => 15)); ?>
		<?php echo $form->error($model,'par_convencional'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_domicilio'); ?>
		<?php echo $form->textField($model, 'par_domicilio', array('maxlength' => 80,'size' => 60,'style' => 'text-transform: uppercase')); ?>
		<?php echo $form->error($model,'par_domicilio'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_fecha_inscripcion'); ?>
                    <?php echo $form->textField($model,'par_fecha_inscripcion',
		array('size'=>20, 'maxlength'=>20, 'value'=>date("Y-m-d"),'readonly'=>'true')); ?>
		<?php echo $form->error($model,'par_fecha_inscripcion'); ?>
		</div><!-- row -->
        </div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('index')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->
