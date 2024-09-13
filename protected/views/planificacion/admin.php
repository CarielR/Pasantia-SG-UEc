<?php
$this->breadcrumbs = array(
	'Planificacions' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Planificacion',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' Planificacion',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('planificacion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Planificacions</h1> -->

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
	'id' => 'planificacion-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'pla_codigo',
		array(
				'name'=>'tca_codigo',
				'value'=>'GxHtml::valueEx($data->tcaCodigo)',
				'filter'=>GxHtml::listDataEx(TipoCapacitacion::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'tev_codigo',
				'value'=>'GxHtml::valueEx($data->tevCodigo)',
				'filter'=>GxHtml::listDataEx(TipoEvento::model()->findAllAttributes(null, true)),
				),
		'pla_programa',
		'pla_nombre',
		'pla_fecha_inicio',
		/*
		'pla_fecha_fin',
		'pla_lugar',
		'pla_curso_codigo',
		'pla_antecedentes',
		'pla_objetivo',
		'pla_metodologia',
		'pla_presupuesto',
		'pla_disposiciones',
		'pla_firma_supervisado',
		'pla_pie_supervisado',
		'pla_fecha',
		'pla_creado_por',
		'pla_fecha_creacion',
		'pla_modificado_por',
		'pla_fecha_modificacion',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>