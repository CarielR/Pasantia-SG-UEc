<?php
$this->breadcrumbs = array(
	'Actividades' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Actividades', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Actividades', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Actividades', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Actividades', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Actividades #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>