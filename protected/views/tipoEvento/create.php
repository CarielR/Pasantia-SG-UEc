<?php
$this->breadcrumbs = array(
	'Tipo Eventos' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' TipoEvento', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' TipoEvento', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> TipoEvento</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>