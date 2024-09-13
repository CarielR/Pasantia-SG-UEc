<?php
$this->breadcrumbs = array(
	'Docentes' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Docente', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Docente', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Docente', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Docente', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Docente #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>