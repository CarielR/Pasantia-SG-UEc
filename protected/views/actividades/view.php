<?php
$this->breadcrumbs = array(
	'Actividades' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Actividades', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Actividades', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Actividades', 'url'=>array('update', 'id' => $model->act_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Actividades', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->act_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Actividades', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Actividades #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'act_codigo',
array(
			'label' => 'Contenido',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->conCodigo)), array('contenido/view', 'id' => GxActiveRecord::extractPkValue($model->conCodigo, true))),
			),
'act_nombre',
'act_fecha',
'act_horas_dictadas',
'act_horas_act_docente',
'act_horas_totales_docente',
'act_valor_pagar',
'act_valor_total',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

