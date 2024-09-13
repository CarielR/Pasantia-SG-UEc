<?php
$this->breadcrumbs = array(
	'Anexoses',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Anexos', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Anexos', 'url' => array('admin')),
);
?>

<h1>Anexoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 