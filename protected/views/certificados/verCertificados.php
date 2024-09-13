<?php
$this->menu = array(
		array('label'=>Yii::t('app', 'Regresar') . '',
			'url'=>array('site/index')),
	); 
?>

<h3><?php echo Yii::t('app', 'CERTIFICADOS'); ?></h3>

<p style="display:none">
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="wide form">
<br/>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'reportes-form',
	'enableAjaxValidation' => true,
));
?>

<?php echo $form->errorSummary($model); ?>
	<div class="panel">
	<br/>
     <table border="0">
        <tr><td>
        <div class="span-8 last">
        <?php echo $form->labelEx($model,'cur_codigo'); ?>
        <?php echo $form->dropDownList($model, 'cur_codigo', GxHtml::listData($cursos,'cur_codigo','cur_nombre'),array('id' => 'id','style'=>'width: 500px')); ?>
        <?php echo $form->error($model,'cur_codigo'); ?>
        </div>
        </td></tr>
        <tr><td>
        <div class="span-8 last">
        <?php echo $form->labelEx($model,'par_busqueda'); ?>
        <?php echo $form->textField($model, 'par_busqueda',array('id' => 'id','style'=>'width: 500px')); ?>
        <?php echo $form->error($model,'par_busqueda'); ?>
        </div>
        </td></tr>
        <tr><td>
        </td>
        </tr>
        <tr><td align="center">
           <?php
        echo GxHtml::submitButton(Yii::t('app', ' Actualizar Consulta '));
        $this->endWidget();
        ?>
        </div>    	
                
        <td></td>
        </td></tr>
   </table>
        <br /><b>
        <?php echo "* Para una búsqueda exacta ingrese su cédula de identidad."?>
        <br/>
        <?php echo "* En el caso de necesitar una copia del certificado enviar un correo a uec-el@espe.edu.ec para poder ayudarle."?>
        </b>
        
</div>
</div>  

<!-- TABLA DE DATOS DESPLEGADOS -->
<br />
<div class="reporte">
<?php $ord=0;?>  
<?php if($reporte!=null){  ?>
<table border="1" class="tabla_reporte">
	<tr>
        <th>ORD.</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>CURSO</th>
        <th>NUMERO REGISTRO</th>
        <th>FECHA CERTIFICADO</th>
	<th>CONSTANCIA</th>
	</tr>
	<?php foreach($reporte as $data)	{ ?>
	<tr>            
        <td align="center"><?php echo $ord+1;?></td>
        <td align="left"><?php echo  $data['par_nombre_participante']?></td>
        <td align="left"><?php echo  $data['par_apellido_participante']?></td>
        <td align="lef"><?php echo  $data['cur_nombre']?></td>
        <td align="center"><?php echo $data['cer_registro']?></td>
        <td align="center"><?php echo $data['cer_fecha']?></td>
        <td align="center"><?php echo '<a href="http://webltga.espe.edu.ec/sg-uec/constancias/'.$data['cer_constancia'].'"><img src="/sg-ri/images/print.png"/></a>'?></td>
        </tr>
	<?php } ?>
</table>
<?php } else { echo "<br/>* No existen Registros en el Sistema";}

?>

</div>


