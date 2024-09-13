<?php
$this->breadcrumbs = array(
	'Participantes' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Participante',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' Participante',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('participante-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Participantes</h1> -->

<p style="display:none">
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'participante-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'par_codigo',
		'par_nombre_participante',
		'par_apellido_participante',
		'par_cedula_participante',
		'par_tipo_participante',
		'par_correo_participante',
		/*
		'par_celular',
		'par_convencional',
		'par_domicilio',
		'par_fecha_inscripcion',
		'par_nombre_repre',
		'par_apellido_repre',
		'par_cedula_repre',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>