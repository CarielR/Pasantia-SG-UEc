<?php
$this->breadcrumbs = array(
	'Cursoses' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Cursos',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' Cursos',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cursos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Cursoses</h1> -->

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
	'id' => 'cursos-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'cur_codigo',
		array(
				'name'=>'pla_codigo',
				'value'=>'GxHtml::valueEx($data->plaCodigo)',
				'filter'=>GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)),
				),
		'cur_nombre',
		'cur_descripcion',
		'cur_fecha_planificacion',
		'cur_codigo_curso',
		/*
		'cur_objetivo',
		'cur_duracion',
		'cur_dirigido',
		'cur_participantes',
		'cur_costo',
		'cur_fecha_inscripcion',
		'cur_nota_aprob',
		'cur_asistencia_aprob',
		'cur_observaciones',
		array(
					'name' => 'cur_estado',
					'value' => '($data->cur_estado === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		'cur_firma_realiza',
		'cur_pie_firma',
		'cur_creado_por',
		'cur_fecha_creacion',
		'cur_modificado_por',
		'cur_fecha_modificacion',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>