<?php
$this->breadcrumbs = array(
//	'Planificacions' => array('adminPlanificacion'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Planificacion', 'url' => array('adminPlanificacion')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Planificacion</h1>

<?php
$this->renderPartial('_formPlanificacion', array(
		'model' => $model,
		'buttons' => 'create'));
?>