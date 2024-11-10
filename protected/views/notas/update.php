<?php
$this->breadcrumbs = array(
	'Notases' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Temario', 'url'=>array('/temario/adminTemario')),
	array('label' => Yii::t('app', 'Gestionar') . ' Notas', 'url'=>array('adminNotas')),
	array('label' => Yii::t('app', 'Ver') . ' Notas', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Notas', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Notas #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('adminNotas', array(
		'model' => $model,
		'resultado' => $resultado	
	));

?>