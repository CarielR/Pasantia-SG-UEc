<div class="wide form">
    <?php $form = $this->beginWidget('GxActiveForm', array(
            'id' => 'actividades-form',
            'enableAjaxValidation' => false,
    ));
    ?>

    
    <?php
            $claveTema=$claveTemario;
            $claveContenido=$clave;
            
            $criteriaTemario = new CDbCriteria();
            $criteriaTemario->condition = "t.tem_codigo =$claveTema";
            $temario= Temario::model()->findAll($criteriaTemario);
            
            ?>
        <p class="note">
            <b><?php echo "CURSO: "?></b>
            <?php echo "".$temario[0]->plaCodigo->pla_nombre ?>
            <br />
            <b><?php echo "TEMA: "?></b>
            <?php echo "".$temario[0]->tem_nombre ?>
            <br />
            <b><?php echo "FECHA: "?></b>
            <?php echo "" .$temario[0]->tem_fecha_inicio." --- ".$temario[0]->tem_fecha_fin ?>
            <br />
        </p>
            <?php
            $criteriaContenido = new CDbCriteria();
            $criteriaContenido->condition = "t.tem_codigo =$claveTema";
            ?>

        
    <p class="note">
        <?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
    </p>


    <?php echo $form->errorSummary($model); ?>
    <div class="panel">
        
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'con_codigo'); ?>
		<?php echo $form->dropDownList($model, 'con_codigo', GxHtml::listDataEx(Contenido::model()->findAll($criteriaContenido))); ?>
		<?php echo $form->error($model,'con_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_nombre'); ?>
		<?php echo $form->textField($model, 'act_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'act_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'act_fecha',
			'value' => $model->act_fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'act_fecha'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_horas_dictadas'); ?>
		<?php echo $form->textField($model, 'act_horas_dictadas', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'act_horas_dictadas'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'act_horas_act_docente'); ?>
		<?php echo $form->textField($model, 'act_horas_act_docente', array('maxlength' => 10,'size' => 10, 'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'act_horas_act_docente'); ?>
		</div><!-- row -->
    </div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		
<?php
echo GxHtml::Button(Yii::t('app', 'Regresar'), array(
			'submit' => array('temario/adminTemario')
		));
echo GxHtml::submitButton(Yii::t('app', 'Registrar Actividad'), array(
			'submit' => array('actividades/createActividad')));
$this->endWidget();
?>
</div><!-- form -->

<div class="panel" align="center">
    <h3 align="center">Actividades:</h3>
   <?php $ord=1; $ordContenido=0; $horasDictadas=0; if($reporteGeneral!=null){?>
 <?php foreach($reporteGeneral as $dataReporte)	{
     
            $horasDictadas=0;
            $ord=1;
            ?>
             <?php // print_r ($reporteContenido)?>
      <table class="tabla_actividad" border="1" cellpadding="0" cellspacing="0" width="100%">        
     <tr>
    
            <td colspan="1" align="center"><b> SUBTEMA: </b></td>
            <td colspan="3" align="center"> <?php echo $reporteContenido[$ordContenido]['subtema']?> </td>
            <td colspan="1" align="center"><b> HORAS PLANIFICADAS:  </b></td>
            <td colspan="1" align="center"> <?php echo $reporteContenido[$ordContenido]['horas']?></td>
     </tr>
    <tr>
            <td align="center"><b>ORD.</b></td>
            <td align="center"><b>ACTIVIDAD</b></td>
            <td align="center"><b>FECHA</b></td>
            <td align="center"><b>HORAS DICTADAS</b></td>
            <td align="center"><b>HORAS ACT. DOCENTE</b></td>
            <td align="center"><b>ELIMINAR</b></td>
            <td></td>
	</tr>
   
        <?php 
        if (is_array($dataReporte) || is_object($dataReporte)){
            foreach($dataReporte as $data)	{ ?>
        <tr>
            <td align="center"><?php echo $ord++;?></td>
            <td align="left"><?php echo $data['actividad']?></td>
            <td align="left"><?php echo $data['fecha']?></td>
            <td align="left"><?php echo $data['horaDictada']?></td>
            <td align="left"><?php echo $data['horaActDocente']?></td>
            <td align="center"><?php echo '<a href="/sg-uec/index.php?r=actividades/delete&id='.$data['codigoActividad'].'"><img src="/sg-uec/images/delete.png" width="16" height="16" alt="Borrar"> </img></a>';?></td>
        </tr>
        <?php $horasDictadas=$horasDictadas+$data['horaDictada'];}  ?>
        <tr >
            <td colspan="7" align="center"><b>HORAS PLANIFICADAS: </b> <?php echo $data['horaPlanificada'] ?>  <br />  <b>  TOTAL HORAS DICTADAS: </b> <?php echo $horasDictadas ?> <br /> <b>  HORAS RESTANTES: </b> <?php  echo $data['horaPlanificada']-$horasDictadas ?> </td>
        </tr>
        </table>
    <?php }
    ?>
    
        <table class="tabla" border="0" cellpadding="0" cellspacing="0" width="100%">        
            <tr>
                <td> . </td>
            </tr>
        </table>
    
    <?php
    $ordContenido++;
    } ?>

    <?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>
</div>
