<?php
$this->breadcrumbs=array(
	'Certificadoses'=>array('index'),
	$model->cer_codigo,
);

$this->menu=array(
	array('label'=>'Listar Certificados', 'url'=>array('index')),
	array('label'=>'Crear Certificados', 'url'=>array('create')),
	array('label'=>'Actualizar Certificados', 'url'=>array('update', 'id'=>$model->cer_codigo)),
	array('label'=>'Eliminar Certificados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cer_codigo),'confirm'=>'¿Está seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Certificados', 'url'=>array('admin')),
);
?>

<h1>Ver Certificados #<?php echo $model->cer_codigo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cer_codigo',
		'par_codigo',
		'cur_codigo',
		'cer_nombre',
		'cer_fecha',
		'cer_carga_usuario',
	),
)); ?>
