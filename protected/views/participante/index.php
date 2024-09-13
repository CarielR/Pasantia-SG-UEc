<?php
$this->breadcrumbs = array(
	//'Participantes',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Participante', 'url' => array('create')),
	//array('label'=>Yii::t('app', 'Gestionar') . ' Participante', 'url' => array('admin')),
);
?>

<h1>Participantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 