<?php
$this->breadcrumbs = array(
	'Tipo Eventos' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' TipoEvento', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' TipoEvento', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' TipoEvento', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' TipoEvento', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> TipoEvento #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>