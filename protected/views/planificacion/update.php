<?php
$this->breadcrumbs = array(
	'Planificacions' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Planificacion', 'url'=>array('adminPlanificacion')),
	array('label' => Yii::t('app', 'Crear') . ' Planificacion', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Planificacion', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Planificacion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Planificacion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>