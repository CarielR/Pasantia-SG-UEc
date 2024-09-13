<?php
$this->breadcrumbs = array(
	'Estado Inscripcions' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' EstadoInscripcion', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' EstadoInscripcion', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> EstadoInscripcion</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>