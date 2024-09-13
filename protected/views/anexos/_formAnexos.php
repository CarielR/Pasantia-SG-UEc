<div class="wide form">
    <?php $form = $this->beginWidget('GxActiveForm', array(
            'id' => 'anexos-form',
            'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="panel">
        <?php
            $clavePlanificaicon=$clave;
            $criteria = new CDbCriteria();
            $criteria->condition = "t.pla_codigo =$clavePlanificaicon";
        ?>
        <?php echo $form->errorSummary($model); ?>
	<div class="panel">
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'pla_codigo'); ?>
		<?php echo $form->dropDownList($model, 'pla_codigo', GxHtml::listDataEx(Planificacion::model()->findAll($criteria))); ?>
		<?php echo $form->error($model,'pla_codigo'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'ane_nombre'); ?>
		<?php echo $form->textField($model, 'ane_nombre', array('maxlength' => 60,'size' => 60)); ?>
		<?php echo $form->error($model,'ane_nombre'); ?>
		</div><!-- row -->
	</div>
    </div>
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		
<?php
echo GxHtml::Button(Yii::t('app', 'Regresar'), array(
			'submit' => array('planificacion/opcionesPlanificacion')
		));
echo GxHtml::submitButton(Yii::t('app', 'Registrar Anexo'), array(
			'submit' => array('anexos/createAnexo')));
$this->endWidget();
?>
</div><!-- form -->

<div class="panel" align="center">
    <h3 align="center">Anexos registrados:</h3>
   <?php $ord=1;  if($reporte!=null){?>
   <table class="tabla_actividad" border="1" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center"><b>ORD.</b></td>
            <td align="center"><b>PLANIFICACION</b></td>
            <td align="center"><b>ANEXO</b></td>
            <td align="center"><b>OPCION</b></td>
            <td></td>
	</tr>
   <?php foreach($reporte as $data)	{ ?>
    <tr>
	<td align="center"><?php echo $ord++;?></td>
        <td align="left"><?php echo $data['planificacion']?></td>
        <td align="left"><?php echo $data['anexo']?></td>        
        <td align="center"><?php echo '<a href="/sg-uec/index.php?r=anexos/delete&id='.$data['codigoAnexo'].'"><img src="/sg-rad/images/delete.png" width="16" height="16" alt="Borrar"> </img></a>';?></td>
    </tr>
  <?php }  ?>

</table>
    <?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>
</div>
