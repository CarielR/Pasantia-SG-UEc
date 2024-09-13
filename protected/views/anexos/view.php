<?php
$this->breadcrumbs = array(
	'Anexoses' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Anexos', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Anexos', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Anexos', 'url'=>array('update', 'id' => $model->ane_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Anexos', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ane_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Anexos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Anexos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'ane_codigo',
array(
			'label' => 'Planificacion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->plaCodigo)), array('planificacion/view', 'id' => GxActiveRecord::extractPkValue($model->plaCodigo, true))),
			),
'ane_nombre',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

