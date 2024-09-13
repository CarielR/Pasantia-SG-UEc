<?php
$this->breadcrumbs = array(
	'Gruposes',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Grupos', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Grupos', 'url' => array('admin')),
);
?>

<h1>Gruposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 