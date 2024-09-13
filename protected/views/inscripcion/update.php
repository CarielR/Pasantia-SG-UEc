<?php
$this->breadcrumbs = array(
	'Inscripcions' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Inscripcion', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Inscripcion', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Inscripcion', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Inscripcion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Inscripcion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>