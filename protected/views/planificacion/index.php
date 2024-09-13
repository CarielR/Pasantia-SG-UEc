<?php
$this->breadcrumbs = array(
	'Planificacions',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Planificacion', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Planificacion', 'url' => array('admin')),
);
?>

<h1>Planificacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 