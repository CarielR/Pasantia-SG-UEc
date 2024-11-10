<?php
$this->breadcrumbs = array(
	//'Temarios' => array('index'),
	Yii::t('app', 'Gestionar'),
);

$this->menu = array(
	//	array('label'=>Yii::t('app', 'Listar') . ' Temario',
	//		'url'=>array('index')),
	//	array('label'=>Yii::t('app', 'Crear') . ' Temario',
	//	'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('temario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1><?php echo Yii::t('app', 'Gestionar'); ?> Temarios</h1> -->

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
$campoClave='tem_codigo';
$botones = array('class' => 'CButtonColumn',
    'template' => '{actividad}{informe}{notas}{asistencia}',
    'buttons' => array
        (
        'actividad' => array
            (
                'label' => Yii::t('int', 'actividad'),
                'url' => 'Yii::app()->createUrl("temario/update",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "actividad.png",),
        'informe' => array
            (
                'label' => Yii::t('int', 'informe'),
                'url' => 'Yii::app()->createUrl("informeFinal/createInforme",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "informe_final.png",),
        
		'notas' => array
            (
                'label' => Yii::t('int', 'notas'),
                'url' => 'Yii::app()->createUrl("notas/createNotas",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "notas.png",),
        
		'asistencia' => array
            (
                'label' => Yii::t('int', 'asistencia'),
                'url' => 'Yii::app()->createUrl("asistencia/create",array("id"=>$data->'.$campoClave.'))',
                'imageUrl' => $sRutaTema . "RegAsist.png",),
        		
		
		
		)
);
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'temario-grid',
	'dataProvider' => $model->searchTemario(),
        'itemsCssClass' => 'table',
	'filter' => $model,
	'columns' => array(
		//'tem_codigo',
		array(
				'name'=>'pla_codigo',
				'value'=>'GxHtml::valueEx($data->plaCodigo)',
				'filter'=>GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)),
				),
		'tem_nombre',
		'tem_fecha_inicio',
		'tem_fecha_fin',
                //'tem_valor_clases',
		$botones,
	),
)); ?>