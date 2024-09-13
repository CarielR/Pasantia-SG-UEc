<?php
$this->breadcrumbs = array(
	'Cursoses' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Cursos', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Cursos', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Cursos', 'url'=>array('update', 'id' => $model->cur_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Cursos', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cur_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Cursos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Cursos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cur_codigo',
array(
			'label' => 'Planificacion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->plaCodigo)), array('planificacion/view', 'id' => GxActiveRecord::extractPkValue($model->plaCodigo, true))),
			),
'cur_nombre',
'cur_descripcion',
'cur_fecha_planificacion',
'cur_codigo_curso',
'cur_objetivo',
'cur_duracion',
'cur_dirigido',
'cur_participantes',
'cur_costo',
'cur_fecha_inscripcion',
'cur_nota_aprob',
'cur_asistencia_aprob',
'cur_observaciones',
'cur_estado',
'cur_firma_realiza',
'cur_pie_firma',
'cur_creado_por',
'cur_fecha_creacion',
'cur_modificado_por',
'cur_fecha_modificacion',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Asistencias</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->asistencias as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('asistencia/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Gruposes</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->gruposes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('grupos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Informe Finals</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->informeFinals as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('informeFinal/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Inscripcions</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->inscripcions as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('inscripcion/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Notases</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->notases as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('notas/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?>