<?php
$this->breadcrumbs = array(
	'Empresas' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Empresa',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' Empresa',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('empresa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Empresas</h1> -->

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
	'id' => 'empresa-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'emp_codigo',
		'emp_nombre',
		'emp_unidad',
		'emp_firma_jefe',
		'emp_pie_jefe',
		'emp_firma_docente',
		/*
		'emp_pie_docente',
		'emp_firma_director_espel',
		'emp_pie_director_espel',
		'emp_pie2_director_espel',
		'emp_firma_aux',
		'emp_pie_aux',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>