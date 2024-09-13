<?php
$this->breadcrumbs = array(
	'Objetivos Especificoses' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' ObjetivosEspecificos',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' ObjetivosEspecificos',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('objetivos-especificos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Objetivos Especificoses</h1> -->

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
	'id' => 'objetivos-especificos-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'obj_codigo',
		array(
				'name'=>'pla_codigo',
				'value'=>'GxHtml::valueEx($data->plaCodigo)',
				'filter'=>GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)),
				),
		'obj_especifico',
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>