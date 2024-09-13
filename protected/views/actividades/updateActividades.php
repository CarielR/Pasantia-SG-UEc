<?php
$this->breadcrumbs = array(
	//'Contenido' => array('index'),
	Yii::t('app', 'Actualizar'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'Menu') . ' Temarios', 'url'=>array('temario/adminTemario')),
        //array('label' => Yii::t('app', 'Temarios') . '', 'url'=>array('temario/updateTemario','id'=>$clavePlan)),
);
?>

<h1><?php echo Yii::t('app', 'Gestión de'); ?> Contenidos<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formActividades', array(
		'model' => $model, 'reporte' => $reporte, 'reporteContenido' => $reporteContenido, 'reporteGeneral' => $reporteGeneral, 'clave' => $clave, 'claveTemario' => $claveTemario));
?>