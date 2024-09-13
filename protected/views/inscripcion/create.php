<?php
$this->breadcrumbs = array(
	'Inscripcions' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Inscripcion', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Inscripcion', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Inscripcion</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>