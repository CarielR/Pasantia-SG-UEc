<?php
$this->breadcrumbs = array(
	'Gruposes' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Grupos', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Grupos', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Grupos', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Grupos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Grupos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>