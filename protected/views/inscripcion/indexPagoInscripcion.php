<?php
$this->breadcrumbs = array(
	'Inscripciones',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Gestionar') . ' Inscripción', 'url' => array('adminPagoInscripcion')),
);
?>

<h1>Inscripciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 