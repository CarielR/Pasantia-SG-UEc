<?php
$this->breadcrumbs = array(
	'Actividades' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Actividades', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Actividades', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Actividades</h1>

<?php
$this->renderPartial('_formActividades', array(
		'model' => $model,
		'buttons' => 'create'));
?>