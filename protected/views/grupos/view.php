<?php
$this->breadcrumbs = array(
	'Gruposes' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Grupos', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Grupos', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Grupos', 'url'=>array('update', 'id' => $model->gru_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Grupos', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->gru_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Grupos', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Grupos #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'gru_codigo',
array(
			'label' => 'Cursos',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curCodigo)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($model->curCodigo, true))),
			),
'gru_nombre',
'gru_horario',
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