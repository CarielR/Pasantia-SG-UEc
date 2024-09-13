<?php
$this->breadcrumbs = array(
	'Estado Inscripcions',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' EstadoInscripcion', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' EstadoInscripcion', 'url' => array('admin')),
);
?>

<h1>Estado Inscripcions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 