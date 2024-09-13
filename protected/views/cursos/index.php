<?php
$this->breadcrumbs = array(
	'Cursoses',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Crear') . ' Cursos', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Cursos', 'url' => array('admin')),
);
?>

<h1>Cursoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 