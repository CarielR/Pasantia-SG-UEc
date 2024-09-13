<?php
$this->breadcrumbs = array(
	//'Cursos' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Menu') . ' Planificacion', 'url'=>array('planificacion/opcionesPlanificacion')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar Curso'); ?> #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formCurso', array(
		'model' => $model, 'reporte' => $reporte, 'clave' => $clave));
?>