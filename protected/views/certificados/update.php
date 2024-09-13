<?php
$this->breadcrumbs=array(
	'Certificadoses'=>array('index'),
	$model->cer_codigo=>array('view','id'=>$model->cer_codigo),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Certificados', 'url'=>array('index')),
	array('label'=>'Crear Certificados', 'url'=>array('create')),
	array('label'=>'Ver Certificados', 'url'=>array('view', 'id'=>$model->cer_codigo)),
	array('label'=>'Administrar Certificados', 'url'=>array('admin')),
);
?>

<h1>Actualizar Certificados <?php echo $model->cer_codigo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>