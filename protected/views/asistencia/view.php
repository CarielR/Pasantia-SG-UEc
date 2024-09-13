<?php
$this->breadcrumbs = array(
	'Asistencias' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Asistencia', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Asistencia', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Asistencia', 'url'=>array('update', 'id' => $model->asi_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Asistencia', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->asi_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Asistencia', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Asistencia #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'asi_codigo',
array(
			'label' => 'Inscripcion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->insCodigo)), array('inscripcion/view', 'id' => GxActiveRecord::extractPkValue($model->insCodigo, true))),
			),
array(
			'label' => 'Cursos',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curCodigo)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($model->curCodigo, true))),
			),
'asi_porcentaje',
'asi_observacion',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

