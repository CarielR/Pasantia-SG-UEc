<?php
$this->breadcrumbs = array(
	'Gruposes' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Grupos', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Grupos', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Grupos</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>