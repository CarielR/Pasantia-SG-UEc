<?php
$this->breadcrumbs = array(
	'Actividades' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Actividades',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' Actividades',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('actividades-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Actividades</h1> -->

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
	'id' => 'actividades-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'act_codigo',
		array(
				'name'=>'con_codigo',
				'value'=>'GxHtml::valueEx($data->conCodigo)',
				'filter'=>GxHtml::listDataEx(Contenido::model()->findAllAttributes(null, true)),
				),
		'act_nombre',
		'act_fecha',
		'act_horas_dictadas',
		'act_horas_act_docente',
		/*
		'act_horas_totales_docente',
		'act_valor_pagar',
		'act_valor_total',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>