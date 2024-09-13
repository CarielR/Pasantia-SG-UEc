<?php
$this->breadcrumbs = array(
	'Informe Finals',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' InformeFinal', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' InformeFinal', 'url' => array('admin')),
);
?>

<h1>Informe Finals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 