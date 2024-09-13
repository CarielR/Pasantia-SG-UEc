<?php
$this->breadcrumbs = array(
	'Docentes' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Docente', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Docente', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Docente', 'url'=>array('update', 'id' => $model->doc_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Docente', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->doc_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Docente', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Docente #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'doc_codigo',
'doc_cedula',
'doc_nombre',
'doc_apellido',
'doc_siglas',
'doc_titulo',
'doc_correo',
'doc_telefono',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

<!--h2>Informe Finals</h2-->
<?php
/*
	echo GxHtml::openTag('ul');
	foreach($model->informeFinals as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('informeFinal/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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