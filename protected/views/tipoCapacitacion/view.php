<?php
$this->breadcrumbs = array(
	'Tipo Capacitacions' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' TipoCapacitacion', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' TipoCapacitacion', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' TipoCapacitacion', 'url'=>array('update', 'id' => $model->tca_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' TipoCapacitacion', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->tca_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' TipoCapacitacion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> TipoCapacitacion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'tca_codigo',
'tca_nombre',
'tca_estado',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Planificacions</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->planificacions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('planificacion/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?>