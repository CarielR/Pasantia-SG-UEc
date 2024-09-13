<?php
$this->breadcrumbs = array(
	'Informe Finals' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' InformeFinal', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' InformeFinal', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> InformeFinal</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>