<?php
$this->breadcrumbs = array(
	'Tipo Capacitacions' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' TipoCapacitacion', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' TipoCapacitacion', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' TipoCapacitacion', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' TipoCapacitacion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> TipoCapacitacion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>