<?php
$this->breadcrumbs = array(
	'Temarios' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Temario', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Temario', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Temario</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>