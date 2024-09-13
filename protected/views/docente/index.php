<?php
$this->breadcrumbs = array(
	'Docentes',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Docente', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Docente', 'url' => array('admin')),
);
?>

<h1>Docentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 