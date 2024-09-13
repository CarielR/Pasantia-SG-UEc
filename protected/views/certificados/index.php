<?php
$this->breadcrumbs=array(
	'Certificadoses',
);

$this->menu=array(
	array('label'=>'Crear Certificados', 'url'=>array('create')),
	array('label'=>'Administrar Certificados', 'url'=>array('admin')),
);
?>

<h1>Certificadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
