<?php $this->pageTitle=Yii::app()->name; ?>

<h2 align="center" style="color:black;"><i>Sistema de Gestión de la Unidad de Educación Continua ESPE - Extensión Latacunga</i></h2>

<table border="0" width="100%">
	<br /><br />
	<tr>
    	<td>
            <?php
            if((Yii::app()->user->id)!=2){
                echo '<a href="index.php?r=inscripcion/createInscripcion"><img src="/sg-uec/images/inscripcion.png"/></a><br>'; 
            }else{
                echo '<a href="index.php?r=participante/create"><img src="/sg-uec/images/registro.png"/></a><br>';
                echo '<a href="index.php?r=certificados/verCertificados"><img src="/sg-uec/images/certificado.png"/></a><br>';
            } ?>
      </td>
    	<td align="left"><img src="/sg-uec/images/logo_uec.png"/>
        </td>
    </tr>
	<br /><br />
</table>
<br /><br />
<h4><a href="doc/Instrucciones.pdf" target="_blank" >Instrucciones para el registro e inscripción de la Unidad de Educación Continua</a></h4>