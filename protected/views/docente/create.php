<?php
$this->breadcrumbs = array(
	'Docentes' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Docente', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Docente', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Docente</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>