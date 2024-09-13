<?php
$this->breadcrumbs = array(
	'Notases' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Notas', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Notas', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Notas', 'url'=>array('update', 'id' => $model->not_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Notas', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->not_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Notas', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Notas #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'not_codigo',
array(
			'label' => 'Cursos',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curCodigo)), array('cursos/view', 'id' => GxActiveRecord::extractPkValue($model->curCodigo, true))),
			),
array(
			'label' => 'Inscripcion',
			'type' => 'raw',
			'value' => GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->insCodigo)), array('inscripcion/view', 'id' => GxActiveRecord::extractPkValue($model->insCodigo, true))),
			),
'not_nota1',
'not_nota2',
'not_final',
'not_observacion',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

