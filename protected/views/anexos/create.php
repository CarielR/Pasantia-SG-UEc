<?php
$this->breadcrumbs = array(
	'Anexoses' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Anexos', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Anexos', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Anexos</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>