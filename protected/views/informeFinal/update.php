<?php
$this->breadcrumbs = array(
	'Informe Finals' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' InformeFinal', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' InformeFinal', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' InformeFinal', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' InformeFinal', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> InformeFinal #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>