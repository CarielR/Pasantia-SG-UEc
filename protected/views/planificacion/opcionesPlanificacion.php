<?php
$this->breadcrumbs = array(
	//'Inscripciones' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar/Editar') . ' Planificación',
			'url'=>array('adminPlanificacion')),
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

<h1><?php echo Yii::t('app', 'Gestionar '); ?> Planificaciones</h1>

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
$campoClave='pla_codigo';
$botones = array('class' => 'CButtonColumn',
    'template' => '{verCurso}{verTemario}{verObjetivos}{verGrupos}{verAnexos}',
    'buttons' => array
        (
        'verCurso' => array
            (
                'label' => Yii::t('int', 'ver'),
                'url' => 'Yii::app()->createUrl("cursos/updateCurso",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "cursos.png",
            ),
        'verTemario' => array
            (
                'label' => Yii::t('int', 'ver'),
                'url' => 'Yii::app()->createUrl("temario/updateTemario",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "temario.png",
            ),
        'verObjetivos' => array
            (
                'label' => Yii::t('int', 'ver'),
                'url' => 'Yii::app()->createUrl("objetivosEspecificos/updateObjetivos",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "objetivos.png",
            ),
        'verGrupos' => array
            (
                'label' => Yii::t('int', 'ver'),
                'url' => 'Yii::app()->createUrl("grupos/updateGrupos",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "grupos.png",
            ),
        'verAnexos' => array
            (
                'label' => Yii::t('int', 'ver'),
                'url' => 'Yii::app()->createUrl("anexos/updateAnexos",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "adjunto.png",
            ),
    ),
);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'planificacion-grid',
	'dataProvider' => $model->search(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		//'pla_codigo',
		array(
				'name'=>'tca_codigo',
				'value'=>'GxHtml::valueEx($data->tcaCodigo)',
				'filter'=>GxHtml::listDataEx(TipoCapacitacion::model()->findAllAttributes(null, true)),
				),
		'pla_programa',
		'pla_nombre',
		'pla_fecha_inicio',
                'pla_curso_codigo',
		$botones,
	),
)); ?>