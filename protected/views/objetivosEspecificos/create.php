<?php
$this->breadcrumbs = array(
	'Objetivos Especificoses' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' ObjetivosEspecificos', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' ObjetivosEspecificos', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> ObjetivosEspecificos</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>