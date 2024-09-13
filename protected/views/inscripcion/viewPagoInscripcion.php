<?php
$this->breadcrumbs = array(
//	'Inscripciones' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Inscripción', 'url'=>array('indexPagoInscripcion')),
	array('label'=>Yii::t('app', 'Pagar') . ' Inscripción', 'url'=>array('updatePagoInscripcion', 'id' => $model->ins_codigo,'cur'=>$model->cur_codigo)),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Inscripción #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
        'ins_codigo',
array(
            'label' => 'Curso',
            'type' => 'raw',
            'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curCodigo)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($model->curCodigo, true))),
        ),
array(
            'label' => 'Participante',
            'type' => 'raw',
            'value' => GxHtml::link(GxHtml::encode(($model->parCodigo->par_apellido_participante.' '.$model->parCodigo->par_nombre_participante)), array('participante/view', 'id' => GxActiveRecord::extractPkValue($model->parCodigo, true))),
        ),
array(
            'label' => 'EstadoInscripción',
            'type' => 'raw',
            'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->einCodigo)), array('estadoInscripcion/view', 'id' => GxActiveRecord::extractPkValue($model->einCodigo, true))),
			),
'ins_fecha_pago_inscripcion',
'ins_pago_valor',
'ins_factura_pago',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
		
)); ?>

