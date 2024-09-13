<?php
$this->breadcrumbs = array(
	//'Participantes' => array('index'),
	Yii::t('app', 'Crear'),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Participante</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>