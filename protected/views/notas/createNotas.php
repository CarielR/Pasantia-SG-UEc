<?php
$this->breadcrumbs = array(
    'Notases' => array('index'),
    Yii::t('app', 'Crear'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Listar') . ' Temario', 'url' => array('/temario/adminTemario')),
);

?>

<h1><?php echo Yii::t('app', 'Crear'); ?> Notas</h1>

<?php
// Renderizar la vista parcial que incluye el formulario y la tabla de participantes con notas
$this->renderPartial('viewNotas', array(
	'model' => $model,
	'resultado' => $resultado,  // Pasar la lista de participantes
	'buttons' => 'create',
));
?>
