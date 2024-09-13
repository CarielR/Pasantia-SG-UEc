<?php
$this->breadcrumbs = array(
	'Cursoses' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Cursos', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Cursos', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Cursos</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>