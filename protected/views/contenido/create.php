<?php
$this->breadcrumbs = array(
	'Contenidos' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Contenido', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Contenido', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Contenido</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>