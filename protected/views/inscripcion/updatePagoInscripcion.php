<?php
$this->breadcrumbs = array(
	'Inscripciones' => array('indexPagoInscripcion'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Listar') . ' Inscripción', 'url'=>array('indexPagoInscripcion')),
);
?>

<h1><?php echo Yii::t('app', 'Actualizar'); ?> Inscripción #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formPagoInscripcion', array(
		'model' => $model,'costoInscripcion'=>$costoInscripcion));
?>