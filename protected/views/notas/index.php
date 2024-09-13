<?php
$this->breadcrumbs = array(
	'Notases',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Notas', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Notas', 'url' => array('admin')),
);
?>

<h1>Notases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 