<?php
$this->breadcrumbs = array(
	'Informe Finals' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' InformeFinal', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' InformeFinal', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' InformeFinal', 'url'=>array('update', 'id' => $model->inf_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' InformeFinal', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->inf_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' InformeFinal', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> InformeFinal #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'inf_codigo',
array(
			'label' => 'Cursos',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curCodigo)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($model->curCodigo, true))),
			),
array(
			'label' => 'Temario',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->temCodigo)), array('temario/view', 'id' => GxActiveRecord::extractPkValue($model->temCodigo, true))),
			),
array(
			'label' => 'Docente',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->docCodigo)), array('docente/view', 'id' => GxActiveRecord::extractPkValue($model->docCodigo, true))),
			),
'inf_nombre',
'inf_fecha_entrega',
'inf_num_asistentes',
'inf_num_inscritos',
'inf_num_retirados',
'inf_num_aprobados',
'inf_promedio_asistencia',
'inf_promedio_calificacion',
'inf_desarrollo',
'inf_logros',
'inf_conclusiones',
'inf_recomendaciones',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

