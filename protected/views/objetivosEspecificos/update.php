<?php
$this->breadcrumbs = array(
	'Objetivos Especificoses' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' ObjetivosEspecificos', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' ObjetivosEspecificos', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' ObjetivosEspecificos', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' ObjetivosEspecificos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> ObjetivosEspecificos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>