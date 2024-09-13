<?php
$this->breadcrumbs = array(
	'Informe Finals' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' InformeFinal',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' InformeFinal',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('informe-final-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Informe Finals</h1> -->

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
	'id' => 'informe-final-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'inf_codigo',
		array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'tem_codigo',
				'value'=>'GxHtml::valueEx($data->temCodigo)',
				'filter'=>GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'doc_codigo',
				'value'=>'GxHtml::valueEx($data->docCodigo)',
				'filter'=>GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true)),
				),
		'inf_nombre',
		'inf_fecha_entrega',
		/*
		'inf_num_asistentes',
		'inf_num_inscritos',
		'inf_num_retirados',
		'inf_num_aprobados',
		'inf_promedio_asistencia',
		'inf_promedio_calificacion',
		'inf_desarrollo',
		'inf_logros',
		'inf_conclusiones',
		'inf_recomendaciones',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>