<?php
$this->breadcrumbs=array(
	'Certificadoses'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Certificados', 'url'=>array('index')),
	array('label'=>'Administrar Certificados', 'url'=>array('admin')),
);
?>

<h1>Crear Certificados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>