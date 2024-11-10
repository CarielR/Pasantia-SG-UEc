<?php
$this->breadcrumbs = array(
	'Asistencias' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' Asistencia', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Asistencia', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Asistencia</h1>

<?php
$this->renderPartial('viewAsistencia', array(
		
		'resultado' => $resultado,
		'fecha' => $fecha,
        'asistencia_existe' => $asistencia_existe,
		'buttons' => 'create'));
?>