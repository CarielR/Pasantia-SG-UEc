<?php
$this->breadcrumbs = array(
	'Participantes' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'Listar') . ' Participante', 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Crear') . ' Participante', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Participante', 'url'=>array('update', 'id' => $model->par_codigo)),
	//array('label'=>Yii::t('app', 'Borrar') . ' Participante', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->par_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Participante', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Participante #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'par_codigo',
'par_nombre_participante',
'par_apellido_participante',
'par_cedula_participante',
'par_tipo_participante',
'par_correo_participante',
'par_celular',
'par_convencional',
'par_domicilio',
'par_fecha_inscripcion',
'par_nombre_repre',
'par_apellido_repre',
'par_cedula_repre',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Inscripcions</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->inscripcions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('inscripcion/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?>