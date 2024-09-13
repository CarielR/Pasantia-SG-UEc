<?php
$this->breadcrumbs = array(
	'Tipo Eventos',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' TipoEvento', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' TipoEvento', 'url' => array('admin')),
);
?>

<h1>Tipo Eventos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 