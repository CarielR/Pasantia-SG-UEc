<?php
$this->breadcrumbs = array(
	'Contenidos' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Contenido', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Contenido', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Contenido', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Contenido', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Contenido #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>