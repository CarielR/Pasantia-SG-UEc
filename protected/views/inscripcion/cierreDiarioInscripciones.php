<?php
$this->breadcrumbs = array(
	//'Reportes' => array('index'),
	Yii::t('app', 'Cierre Diario'),
);
$this->menu = array(
                array('label'=>Yii::t('app', 'Imprimir PDF') . ' ',
			'url'=>'#',
                        'linkOptions' => array('submit' => array('cierreDiarioInscripcionesPdf'),
				'params'=>array('par_fecha_ini' => $model->par_fecha_ini,
                                                'reporte'=>base64_encode(serialize($reporte)),
                    ))),
        );

?>

<h3><?php echo Yii::t('app', 'Cierre Diario de Inscripciones'); ?></h3>

<div class="wide form">
<br/>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pago-form',
	'enableAjaxValidation' => true,
));
?>

<?php echo $form->errorSummary($model); ?>
	<div class="panel">
	<br/>
    <table border="0">
        <tr><td>
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'par_fecha_ini'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'par_fecha_ini',
			'value' => $model->par_fecha_ini,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',),
				'htmlOptions' => array('maxlength' => 10,'size'=>'12'),
			));
; ?>
        <?php echo $form->error($model,'par_fecha_ini'); ?>
        </div>
        </td>
        <td>
        <div class="span-8 last">
            <?php echo $form->radioButtonList($model,'par_opcion',array('Fecha'=>'Por Fecha'),array('labelOptions'=>array('style'=>'display:inline'))); ?>
            <?php echo $form->error($model,'par_opcion'); ?>
        </div>
        </td>
        <td></td>
        <td></td>
        </tr>
        <tr><td align="center">
        <div class="span-8 last">
       	<?php
		echo GxHtml::submitButton(Yii::t('app', ' Actualizar Consulta '));
		$this->endWidget();
		?>
        </div>
        </td><td>
        </td><td>
        </td><td>
        </td></tr>
        </table>
</div>
</div>  

<!-- TABLA DE DATOS DESPLEGADOS -->
<br />
<h3>CIERRE DE INSCRIPCIONES DIARIAS</h3>
<div class="reporte">
<?php $ord=1;?>  
<?php if($reporte!=null){ $total=0; ?>
<table border="1" class="tabla_reporte">
	<tr>
		<th>ORD.</th>
	  	<th>CEDULA</th>
                <th>NOMBRE</th>
                <th>CURSO</th>
                <th>VALOR</th>
                <th>FECHA</th>
	</tr>
	<?php foreach($reporte as $data)	{ ?>
	<tr>
		<td align="center"><?php echo $ord++;?></td>
                <td align="center"><?php echo $data->parCodigo->par_cedula_participante?></td>
		<td><?php echo $data->parCodigo->par_apellido_participante.' '.$data->parCodigo->par_nombre_participante?></td>
                <td align="center"><?php echo $data->curCodigo->cur_nombre; ?></td>
                <td align="center"><?php echo $data->ins_pago_valor?></td>
                <td align="center"><?php echo $data->ins_fecha_pago_inscripcion; ?></td>
        <?php $total=$total+$data->ins_pago_valor;?>
    </tr>
	<?php } ?>
    <tr>
    <td colspan="4"><b>TOTAL</b></td>
    <td align="center"><b><?php echo $total;?></b></td>
    <td></td>
    </tr>
</table>
<?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>

</div>