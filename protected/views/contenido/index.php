<?php
$this->breadcrumbs = array(
	'Contenidos',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Contenido', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Contenido', 'url' => array('admin')),
);
?>

<h1>Contenidos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 