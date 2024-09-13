<?php
$this->breadcrumbs = array(
	//'Informe Finals' => array('index'),
	Yii::t('app', 'Crear'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Regresar') . ' Temario', 'url' => array('temario/adminTemario')),
        array('label' => 'Imprimir','url' => '#',
                     'linkOptions' => array('submit' => array('InformeInstructorPdf'),
                            'params'=>array('model' => base64_encode(serialize($model)),
                                            ))),   
    
);
?>

<h1><?php echo Yii::t('app', ''); ?> Informe Final</h1>

<?php
$this->renderPartial('_formInforme', array(
		'model' => $model,
		'buttons' => 'create'));
?>