<?php
$this->breadcrumbs = array(
	'Inscripcions' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Inscripcion', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Inscripcion', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Inscripcion', 'url'=>array('update', 'id' => $model->ins_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Inscripcion', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ins_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Inscripcion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Inscripcion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'ins_codigo',
array(
			'label' => 'Cursos',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curCodigo)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($model->curCodigo, true))),
			),
array(
			'label' => 'EstadoInscripcion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->einCodigo)), array('estadoInscripcion/view', 'id' => GxActiveRecord::extractPkValue($model->einCodigo, true))),
			),
array(
			'label' => 'Participante',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->parCodigo)), array('participante/view', 'id' => GxActiveRecord::extractPkValue($model->parCodigo, true))),
			),
array(
			'label' => 'Grupos',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->gruCodigo)), array('grupos/view', 'id' => GxActiveRecord::extractPkValue($model->gruCodigo, true))),
			),
'ins_fecha_inscripcion',
'ins_factura_pago',
'ins_pago_inscripcion',
'ins_fecha_pago_inscripcion',
'ins_pago_auditoria',
'ins_pago_valor',
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