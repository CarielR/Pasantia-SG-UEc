<?php
$this->breadcrumbs = array(
	//'Anexos' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Menu') . ' Planificacion', 'url'=>array('planificacion/opcionesPlanificacion')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Anexos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formAnexos', array(
		'model' => $model, 'reporte' => $reporte, 'clave' => $clave));
?>