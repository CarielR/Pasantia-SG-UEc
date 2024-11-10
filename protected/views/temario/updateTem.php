<div class="wide form">
    <?php $form = $this->beginWidget('GxActiveForm', array(
            'id' => 'temario-form',
            'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="panel">
        <?php
            $clavePlanificacion=$clave;
            $criteria = new CDbCriteria();
            $criteria->condition = "t.pla_codigo =$clavePlanificacion";
        ?>
            <?php echo $form->errorSummary($model); ?>
            <div class="panel">
                <!-- 
                <div class="span-8 last">
                <?php // echo $form->labelEx($model,'pla_codigo'); ?>
                <?php // echo $form->dropDownList($model, 'pla_codigo', GxHtml::listDataEx(Planificacion::model()->findAll($criteria))); ?>
                <?php // echo $form->error($model,'pla_codigo'); ?>
                </div>
                <div class="span-8 last">
                <?php
                    // Cargar Bombo Box con datos de dos campos
                    // $docente = new CDbCriteria;
                    // $docente->select = 't.doc_codigo,concat(doc_nombre,\'  \',doc_apellido) as doc_apellido'; 
                ?>
                <?php // echo $form->labelEx($model,'doc_codigo'); ?>
                <?php // echo $form->dropDownList($model, 'doc_codigo', GxHtml::listDataEx(Docente::model()->findAll($docente),'doc_codigo','doc_apellido')); ?>
                <?php // echo $form->error($model,'doc_codigo'); ?>
                </div>
                <div class="span-8 last">
                <?php // echo $form->labelEx($model,'tem_nombre'); ?>
                <?php // echo $form->textField($model, 'tem_nombre', array('maxlength' => 100,'size' => 80)); ?>
                <?php // echo $form->error($model,'tem_nombre'); ?>
                </div>
                -->
                <div class="span-8 last">
                <?php echo $form->labelEx($model,'tem_fecha_inicio'); ?>
                <?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'tem_fecha_inicio',
                    'value' => $model->tem_fecha_inicio,
                    'options' => array(
                        'showButtonPanel' => true,
                        'changeYear' => true,
                        'dateFormat' => 'yy-mm-dd',
                        ),
                    ));
                ?>
                <?php echo $form->error($model,'tem_fecha_inicio'); ?>
                </div>
                <div class="span-8 last">
                <?php echo $form->labelEx($model,'tem_fecha_fin'); ?>
                <?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'tem_fecha_fin',
                    'value' => $model->tem_fecha_fin,
                    'options' => array(
                        'showButtonPanel' => true,
                        'changeYear' => true,
                        'dateFormat' => 'yy-mm-dd',
                        ),
                    ));
                ?>
                <?php echo $form->error($model,'tem_fecha_fin'); ?>
                </div>
                <!--
                <div class="span-8 last">
                <?php // echo $form->labelEx($model,'tem_valor_clases'); ?>
                <?php // echo $form->textField($model, 'tem_valor_clases', array('maxlength' => 10,'size' => 10)); ?>
                <?php // echo $form->error($model,'tem_valor_clases'); ?>
                </div>
                -->
            </div>
    </div>
<div class="row"></div>

<?php
echo GxHtml::Button(Yii::t('app', 'Regresar'), array(
            'submit' => array('planificacion/opcionesPlanificacion')
        ));
echo GxHtml::submitButton(Yii::t('app', 'Registrar Temas'), array(
            'submit' => array('temario/createTemario')));
$this->endWidget();
?>
</div><!-- form -->

<div class="panel" align="center">
    <h3 align="center">Temas Generales registrados:</h3>
   <?php $ord=1;  if($reporte!=null){?>
   <table class="tabla_actividad" border="1" cellpadding="1" cellspacing="0">
        <tr>
            <td align="center"><b>ORD.</b></td>
            <!-- <td align="center"><b>PLANIFICACION</b></td> -->
            <!-- <td align="center"><b>INSTRUCTOR</b></td> -->
            <!-- <td align="center"><b>TEMA</b></td> -->
            <td align="center"><b>FEC. INICIO</b></td>
            <td align="center"><b>FEC. FIN</b></td>
            <!-- <td align="center"><b>SUBTEMAS</b></td> -->
            <td align="center"><b>ELIMINAR</b></td>
            <td></td>
        </tr>
   <?php foreach($reporte as $data)    { ?>
    <tr>
        <td align="center"><?php echo $ord++;?></td>
        <!-- <td align="left"><?php // echo $data['planificacion']?></td> -->
        <!-- <td align="left"><?php // echo $data['instructor']?></td> -->
        <!-- <td align="left"><?php // echo $data['tema']?></td> -->
        <td align="left"><?php echo $data['fechaInicio']?></td>
        <td align="left"><?php echo $data['fechaFin']?></td>
        <!-- <td align="center"><?php // echo '<a href="/sg-uec/index.php?r=contenido/updateContenido&id='.$data['codigoTemario'].'"><img src="/sg-uec/images/new.png" width="16" height="16" alt="Agregar"> </img></a>';?></td> -->
        <td align="center"><?php echo '<a href="/sg-uec/index.php?r=temario/delete&id='.$data['codigoTemario'].'"><img src="/sg-uec/images/delete.png" width="16" height="16" alt="Borrar"> </img></a>';?></td>
    </tr>
  <?php }  ?>

</table>
    <?php } else { echo "<br/>* No existen Registros en el Sistema";} ?>
</div>