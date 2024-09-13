<?php
$this->breadcrumbs = array(
	'Inscripcions',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Inscripcion', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Inscripcion', 'url' => array('admin')),
);
?>

<h1>Inscripcions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 