<?php
$this->breadcrumbs = array(
	'Objetivos Especificoses',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' ObjetivosEspecificos', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' ObjetivosEspecificos', 'url' => array('admin')),
);
?>

<h1>Objetivos Especificoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 