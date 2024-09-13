<?php
$this->breadcrumbs = array(
	'Estado Inscripcions' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' EstadoInscripcion', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' EstadoInscripcion', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' EstadoInscripcion', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' EstadoInscripcion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> EstadoInscripcion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>