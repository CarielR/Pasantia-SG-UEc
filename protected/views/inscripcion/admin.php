<?php
$this->breadcrumbs = array(
	'Inscripcions' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Inscripcion',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Crear') . ' Inscripcion',
		'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inscripcion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Inscripcions</h1> -->

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
	'id' => 'inscripcion-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		'ins_codigo',
		array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'ein_codigo',
				'value'=>'GxHtml::valueEx($data->einCodigo)',
				'filter'=>GxHtml::listDataEx(EstadoInscripcion::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'par_codigo',
				'value'=>'GxHtml::valueEx($data->parCodigo)',
				'filter'=>GxHtml::listDataEx(Participante::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'gru_codigo',
				'value'=>'GxHtml::valueEx($data->gruCodigo)',
				'filter'=>GxHtml::listDataEx(Grupos::model()->findAllAttributes(null, true)),
				),
		'ins_fecha_inscripcion',
		/*
		'ins_factura_pago',
		'ins_pago_inscripcion',
		'ins_fecha_pago_inscripcion',
		'ins_pago_auditoria',
		'ins_pago_valor',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>