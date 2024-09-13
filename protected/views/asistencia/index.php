<?php
$this->breadcrumbs = array(
	'Asistencias',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Asistencia', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Asistencia', 'url' => array('admin')),
);
?>

<h1>Asistencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 