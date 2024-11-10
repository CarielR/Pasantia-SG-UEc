<?php
$this->breadcrumbs = array(
	'Asistencias' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Asistencia', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Crear') . ' Asistencia', 'url'=>array('create')),
	//array('label' => Yii::t('app', 'Gestionar') . ' Asistencia', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Asistencia </h1>

<?php
$this->renderPartial('viewAsistencia', array(
		


		'resultado' => $resultado

	));
?>