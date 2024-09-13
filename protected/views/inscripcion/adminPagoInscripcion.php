<?php
$this->breadcrumbs = array(
	//'Inscripciones' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' Inscripción',
			'url'=>array('indexPagoInscripcion')),
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

<?php // Personalizar los Botones de GridView
$sRutaTema = Yii::app()->baseUrl . '/images/';
$campoClave='ins_codigo';
$curso='cur_codigo';
$botones = array('class' => 'CButtonColumn',
    'template' => '{ver}',
    'buttons' => array
        (
        'ver' => array
            (
                'label' => Yii::t('int', 'ver'),
                'url' => 'Yii::app()->controller->createUrl("updatePagoInscripcion",array("id"=>$data->'.$campoClave.',"cur"=>$data->'.$curso.'
			))',
            'imageUrl' => $sRutaTema . "pago.png",
        ),
    ),
);
?>
<?php //Cargar Bombo Box con datos de dos campos
	$participante = new CDbCriteria;
        $participante->order = 'par_apellido_participante ASC';
	$participante->select = 'par_codigo, par_cedula_participante,concat(par_apellido_participante,\'  \',par_nombre_participante) as par_apellido_participante'; ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'inscripcion-grid',
	'dataProvider' => $model->search_no_pagados(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		//'ins_codigo',
		array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'par_codigo',
				'value'=>'($data->parCodigo->par_cedula_participante)',
				'filter'=>false,
				),
                array(
				'name'=>'par_codigo',
				'value'=>'($data->parCodigo->par_apellido_participante.\' \'.$data->parCodigo->par_nombre_participante)',
				'filter'=>false,
				),
		'ins_fecha_inscripcion',
		$botones,
	),
)); ?>