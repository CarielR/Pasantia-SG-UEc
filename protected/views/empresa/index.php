<?php
$this->breadcrumbs = array(
	'Empresas',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Empresa', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Empresa', 'url' => array('admin')),
);
?>

<h1>Empresas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 