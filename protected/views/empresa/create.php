<?php
$this->breadcrumbs = array(
	'Empresas' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Empresa', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Empresa', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Empresa</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>