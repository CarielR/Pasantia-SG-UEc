<?php
$this->breadcrumbs = array(
	'Objetivos Especificoses' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' ObjetivosEspecificos', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' ObjetivosEspecificos', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' ObjetivosEspecificos', 'url'=>array('update', 'id' => $model->obj_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' ObjetivosEspecificos', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->obj_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' ObjetivosEspecificos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> ObjetivosEspecificos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'obj_codigo',
array(
			'label' => 'Planificacion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->plaCodigo)), array('planificacion/view', 'id' => GxActiveRecord::extractPkValue($model->plaCodigo, true))),
			),
'obj_especifico',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

