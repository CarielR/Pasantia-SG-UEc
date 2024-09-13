<?php
$this->breadcrumbs = array(
	'Asistencias' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Asistencia', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Asistencia', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Asistencia', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Asistencia', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Asistencia #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>