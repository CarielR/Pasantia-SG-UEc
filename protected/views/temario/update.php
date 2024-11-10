<?php
$this->breadcrumbs = array(
	'Temarios' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Temario', 'url'=>array('adminTemario')),
	array('label' => Yii::t('app', 'Crear') . ' Temario', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Temario', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Temario', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Temario #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>