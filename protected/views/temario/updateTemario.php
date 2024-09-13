<?php
$this->breadcrumbs = array(
	//'Temario' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Menu') . ' Planificacion', 'url'=>array('planificacion/opcionesPlanificacion')),
);
?>

<h1><?php echo Yii::t('app', 'Gestión de '); ?> Temas<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formTemario', array(
		'model' => $model, 'reporte' => $reporte, 'clave' => $clave));
?>