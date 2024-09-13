<?php
$this->breadcrumbs = array(
	//'Planificacions' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Planificaciones', 'url'=>array('adminPlanificacion')),
	array('label'=>Yii::t('app', 'Crear') . ' Planificacion', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Planificacion', 'url'=>array('update', 'id' => $model->pla_codigo)),
        array('label'=>Yii::t('app', 'Gestionar') . ' Planificacion', 'url'=>array('menuPlanificacion', 'id' => $model->pla_codigo)),
	//array('label'=>Yii::t('app', 'Borrar') . ' Planificacion', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->pla_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Planificacion', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Planificacion #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
//'pla_codigo',
array(
			'label' => 'TipoCapacitacion',
                        'type' => 'raw',
			//'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tcaCodigo)), array('tipoCapacitacion/view', 'id' => GxActiveRecord::extractPkValue($model->tcaCodigo, true))),
                        'value' => GxHtml::valueEx($model->tcaCodigo), array('tipoCapacitacion/view', 'id' => GxActiveRecord::extractPkValue($model->tcaCodigo, true)),
			),
array(
			'label' => 'TipoEvento',
			'type' => 'raw',
			//'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tevCodigo)), array('tipoEvento/view', 'id' => GxActiveRecord::extractPkValue($model->tevCodigo, true))),
                        'value' => GxHtml::encode(GxHtml::valueEx($model->tevCodigo)), array('tipoEvento/view', 'id' => GxActiveRecord::extractPkValue($model->tevCodigo, true)),
			),
'pla_programa',
'pla_nombre',
'pla_fecha_inicio',
'pla_fecha_fin',
'pla_lugar',
'pla_curso_codigo',
'pla_antecedentes',
'pla_objetivo',
//'pla_metodologia',
//'pla_presupuesto',
//'pla_disposiciones',
'pla_firma_supervisado',
'pla_pie_supervisado',
'pla_fecha',
//'pla_certificacion_presupuestaria',
//'pla_instructivo',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Anexoses</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->anexoses as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('anexos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Cursoses</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->cursoses as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Objetivos Especificoses</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->objetivosEspecificoses as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('objetivosEspecificos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?><!--h2>Temarios</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->temarios as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('temario/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');*/
?>