<?php
$this->breadcrumbs = array(
	'Temarios',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Temario', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Temario', 'url' => array('admin')),
);
?>

<h1>Temarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 