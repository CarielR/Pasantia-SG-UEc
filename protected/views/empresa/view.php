<?php
$this->breadcrumbs = array(
	'Empresas' => array('index'),
	Yii::t('app', 'Ver'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' Empresa', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Crear') . ' Empresa', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Actualizar') . ' Empresa', 'url'=>array('update', 'id' => $model->emp_codigo)),
	array('label'=>Yii::t('app', 'Borrar') . ' Empresa', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->emp_codigo), 'confirm'=>'¿Esta seguro que desea eliminar este elemento?')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Empresa', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Ver'); ?> Empresa #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'emp_codigo',
'emp_nombre',
'emp_unidad',
'emp_firma_jefe',
'emp_pie_jefe',
'emp_firma_docente',
'emp_pie_docente',
'emp_firma_director_espel',
'emp_pie_director_espel',
'emp_pie2_director_espel',
'emp_firma_aux',
'emp_pie_aux',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

