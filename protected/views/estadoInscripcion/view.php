<?php
$this->breadcrumbs = array(
	'Estado Inscripcions' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' EstadoInscripcion', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' EstadoInscripcion', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' EstadoInscripcion', 'url'=>array('update', 'id' => $model->ein_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' EstadoInscripcion', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ein_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' EstadoInscripcion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> EstadoInscripcion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'ein_codigo',
'ein_nombre',
'ein_estado',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Inscripcions</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->inscripcions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('inscripcion/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?>