<?php
$this->breadcrumbs = array(
	'Temarios' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Temario', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Temario', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Temario', 'url'=>array('update', 'id' => $model->tem_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Temario', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->tem_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Temario', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Temario #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'tem_codigo',
array(
			'label' => 'Planificacion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->plaCodigo)), array('planificacion/view', 'id' => GxActiveRecord::extractPkValue($model->plaCodigo, true))),
			),
array(
			'label' => 'Docente',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->docCodigo)), array('docente/view', 'id' => GxActiveRecord::extractPkValue($model->docCodigo, true))),
			),
'tem_nombre',
'tem_fecha_inicio',
'tem_fecha_fin',
'tem_valor_clases',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Contenidos</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->contenidos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('contenido/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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
?>