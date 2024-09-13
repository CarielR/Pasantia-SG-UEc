<?php
$this->breadcrumbs = array(
	'Empresas' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Empresa', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Empresa', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Empresa', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Empresa', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Empresa #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>