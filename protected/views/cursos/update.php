<?php
$this->breadcrumbs = array(
	'Cursoses' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Cursos', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Cursos', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Cursos', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Cursos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Cursos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>