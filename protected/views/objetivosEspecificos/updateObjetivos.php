<?php
$this->breadcrumbs = array(
	//'Objetivos' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	//array('label' => Yii::t('app', 'Listar') . ' Grupos', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Menu') . ' Planificacion', 'url'=>array('planificacion/opcionesPlanificacion')),
	//array('label' => Yii::t('app', 'Gestionar') . ' Grupos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Objetivos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formObjetivos', array(
		'model' => $model, 'reporte' => $reporte, 'clave' => $clave));
?>