<?php
$this->breadcrumbs = array(
	'Tipo Capacitacions',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' TipoCapacitacion', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' TipoCapacitacion', 'url' => array('admin')),
);
?>

<h1>Tipo Capacitacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 