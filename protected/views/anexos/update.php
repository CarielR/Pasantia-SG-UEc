<?php
$this->breadcrumbs = array(
	'Anexoses' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Anexos', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Anexos', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Anexos', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Anexos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Anexos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>