<div class="wide form">
    <?php $form = $this->beginWidget('GxActiveForm', array(
            'id' => 'contenido-form',
            'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="panel">
        <?php
            $clavePlanificacion=$clavePlan;
            $claveTemario=$clave;
            $criteria = new CDbCriteria();
            $criteria->condition = "t.tem_codigo =$claveTemario";
        ?>
                <div class="span-8 last">
		<?php echo $form->labelEx($model,'tem_codigo'); ?>
		<?php echo $form->dropDownList($model, 'tem_codigo', GxHtml::listDataEx(Temario::model()->findAll($criteria))); ?>
		<?php echo $form->error($model,'tem_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_nombre'); ?>
		<?php echo $form->textField($model, 'con_nombre', array('maxlength' => 100,'size' => 80)); ?>
		<?php echo $form->error($model,'con_nombre'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_horas_planificadas'); ?>
		<?php echo $form->textField($model, 'con_horas_planificadas', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'con_horas_planificadas'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'con_horas_act_planificadas'); ?>
		<?php echo $form->textField($model, 'con_horas_act_planificadas', array('maxlength' => 10,'size' => 10)); ?>
		<?php echo $form->error($model,'con_horas_act_planificadas'); ?>
		</div><!-- row -->
    </div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		
<?php
echo GxHtml::Button(Yii::t('app', 'Regresar'), array(
			'submit' => array('temario/updateTemario','id' => $clavePlanificacion)
		));
echo GxHtml::submitButton(Yii::t('app', 'Registrar Contenido'), array(
			'submit' => array('contenido/createContenido')));
$this->endWidget();
?>
</div><!-- form -->

<div class="panel" align="center">
    <h3 align="center">Contenidos del Tema:</h3>
   <?php $ord=1;  if($reporte!=null){?>
   <table class="tabla_actividad" border="1" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center"><b>ORD.</b></td>
            <td align="center"><b>TEMA</b></td>
            <td align="center"><b>COTENIDO</b></td>
            <td align="center"><b>H. CLASE</b></td>
            <td align="center"><b>H. ACT. DOCENTE</b></td>
            <td align="center"><b>ELIMINAR</b></td>
            <td></td>
	</tr>
   <?php foreach($reporte as $data)	{ ?>
    <tr>
	<td align="center"><?php echo $ord++;?></td>
        <td align="left"><?php echo $data['tema']?></td>
        <td align="left"><?php echo $data['contenido']?></td>
        <td align="left"><?php echo $data['horaClase']?></td>
        <td align="left"><?php echo $data['horaActividad']?></td>
        <td align="center"><?php echo '<a href="/sg-uec/index.php?r=contenido/delete&id='.$data['codigoContenido'].'"><img src="/sg-uec/images/delete.png" width="16" height="16" alt="Borrar"> </img></a>';?></td>
    </tr>
  <?php }  ?>

</table>
    <?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>
</div>
