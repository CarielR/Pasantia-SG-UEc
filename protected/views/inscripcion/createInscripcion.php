<?php
$this->breadcrumbs = array(
	//'Inscripcions' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
        //array('label'=>Yii::t('app', 'Editar') . ' Datos Participante', 'url' => array('updateParticipante')),
	array('label'=>Yii::t('app', 'Ver') . ' Inscripción', 'url' => array('viewInscripcion')),
);
?>

<h1><?php echo Yii::t('app', 'Registrar'); ?> Inscripción</h1>

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
                    <?php //Cargar Bombo Box con cursos activos
                        $cursos = new CDbCriteria;
                        $cursos->condition = 'cur_estado=1'; ?>
		<?php echo $form->labelEx($model,'cur_codigo'); ?>
		<?php echo $form->dropDownList($model,'cur_codigo',CHtml::listData(Cursos::model()->findAll($cursos),'cur_codigo','cur_nombre'),
                        array('ajax' => array('type' => 'POST',
                            'url' => CController::createUrl('Grupos/cargarGrupos'),
                            'update' => '#Inscripcion_gru_codigo','data'=>array('miCurso'=>'js:this.value') ),
                            'prompt' => 'Seleccione un Curso' )); ?>
                <?php //echo $form->dropDownList($model, 'cur_codigo', GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cur_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ein_codigo'); ?>
		<?php echo $form->dropDownList($model, 'ein_codigo', GxHtml::listDataEx(EstadoInscripcion::model()->findAll('ein_codigo=1'))); ?>
		<?php echo $form->error($model,'ein_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
                <?php //Cargar Bombo Box con datos de dos campos
			  $personal = new CDbCriteria;
			  $personal->select = 't.par_codigo,concat(par_nombre_participante,\'  \',par_apellido_participante) as par_apellido_participante'; 
                          $personal->addCondition('t.par_cedula_participante = '.Yii::app()->user->name.';'); ?>
		<?php echo $form->labelEx($model,'par_codigo'); ?>
                <?php echo $form->dropDownList($model, 'par_codigo', CHtml::listData(Participante::model()->findAll($personal),'par_codigo','par_apellido_participante'));?>
		<?php echo $form->error($model,'par_codigo'); ?>
		</div><!-- row -->
		
                <div class="row">
                <?php echo $form->labelEx($model,'gru_codigo'); ?>
                <?php if ($model->isNewRecord==1) {
                            echo $form->dropDownList($model,'gru_codigo',
                            array('0' => 'Seleccione un Grupo'));
			}else{
                            $curso=$model->cur_codigo;
                            $sql="select count(gru_codigo) as total from grupos where cur_codigo='$curso';";
                            $connection=Yii::app()->db;
                            $command=$connection->createCommand($sql);
                            $row=$command->queryRow();
                            $bandera=$row['total'];
                            if ($bandera==0) {
                                    echo $form->dropDownList($model,'gru_codigo',
                                    array('0' => 'Seleccione un Grupo')); 
                            } else {
                                    echo $form->dropDownList($model,'gru_codigo',
                                    CHtml::listData(Grupos::model()->findAllBySql(
                                    "select * from grupos where cur_codigo=:keyword order by gru_nombre=:clave2 asc",
                                    array(':keyword'=>$model->cur_codigo,':clave2'=>$model->gru_codigo)),
                                    'gru_codigo','gru_nombre'));
                            }
	 		}?>
                    <?php echo $form->error($model,'gru_codigo'); ?>
                    </div><!-- row -->
                
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'ins_fecha_inscripcion'); ?>
		<?php echo $form->textField($model, 'ins_fecha_inscripcion',array('size'=>20, 'maxlength'=>20, 'value'=>date("Y-m-d H:i:s"),'readonly'=>'true')); ?>
		<?php echo $form->error($model,'ins_fecha_inscripcion'); ?>
                </div><!-- row -->
        </div>
        <!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php

echo GxHtml::Button(Yii::t('app', 'Cancelar'), array(
			'submit' => array('site/index')
		));
echo GxHtml::submitButton(Yii::t('app', 'Grabar'));
$this->endWidget();
?>
</div><!-- form -->