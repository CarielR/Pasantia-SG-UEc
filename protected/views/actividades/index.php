<?php
$this->breadcrumbs = array(
	'Actividades',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Actividades', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Actividades', 'url' => array('adminActividades')),
);
?>

<h1>Actividades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 