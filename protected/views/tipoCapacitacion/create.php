<?php
$this->breadcrumbs = array(
	'Tipo Capacitacions' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' TipoCapacitacion', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' TipoCapacitacion', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> TipoCapacitacion</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>