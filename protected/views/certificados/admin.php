<?php
$this->breadcrumbs=array(
	'Certificadoses'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Certificados', 'url'=>array('index')),
	array('label'=>'Crear Certificados', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('certificados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Certificadoses</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'certificados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cer_codigo',
		'par_codigo',
		'cur_codigo',
		'cer_nombre',
		'cer_fecha',
		'cer_carga_usuario',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
