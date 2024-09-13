<?php
$this->breadcrumbs = array(
	'Notases' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Notas', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Notas', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Notas</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>