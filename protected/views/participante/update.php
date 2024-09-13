<?php
$this->breadcrumbs = array(
	'Participantes' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	//array('label' => Yii::t('app', 'Listar') . ' Participante', 'url'=>array('index')),
	//array('label' => Yii::t('app', 'Crear') . ' Participante', 'url'=>array('create')),
	array('label' => Yii::t('app', 'Ver') . ' Participante', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Gestionar') . ' Participante', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Participante #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>