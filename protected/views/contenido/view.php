<?php
$this->breadcrumbs = array(
	'Contenidos' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Contenido', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Contenido', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Contenido', 'url'=>array('update', 'id' => $model->con_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Contenido', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->con_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Contenido', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Contenido #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'con_codigo',
array(
			'label' => 'Temario',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->temCodigo)), array('temario/view', 'id' => GxActiveRecord::extractPkValue($model->temCodigo, true))),
			),
'con_nombre',
'con_horas_planificadas',
'con_horas_act_planificadas',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

