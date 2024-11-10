<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>                
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/web-app-theme/base.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/web-app-theme/themes/orange/style.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/web-app-theme/override.css" type="text/css" media="screen"/>
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" type="text/css" media="screen"/>
	</head>
	<body>
		<div id="container">
			<div id="header" style="background-image:url(/sg-uec/images/header.png)" style="background-position:center">
				<h1>
					<a href="<?php echo Yii::app()->homeUrl; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</h1>
                
				<div id="user-navigation">
					<?php $this->widget('zii.widgets.CMenu', array(
						'items' => array(
							array('label' => 'Inicio', 'url' => Yii::app()->homeUrl),
                                                        array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                                        array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
							//array('label' => 'Logout', 'url' => array('/site/logout'), 'linkOptions' => array('class' => 'logout'), 'visible' => !Yii::app()->user->isGuest),
						),
						'htmlOptions' => array(
							'class' => 'wat-cf',
						),
					)); ?>
                   <!--  Bara de Ruta de la Aplicación -->
                   <br>&nbsp;
					<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
					<?php endif?>
				   
				</div>
			</div>
            <div id="mainMbMenu">
        	<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                    array('label'=>'Planificacion','visible'=>Yii::app()->user->checkAccess("menu_procesos_planificacion"),
                        'items'=>array(
                            array('label'=>'Crear Planificación', 'url'=>array('/planificacion/adminPlanificacion'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_planificacion_plan")),
                            array('label'=>'Menú Planificación', 'url'=>array('/planificacion/opcionesPlanificacion'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_planificacion_opciones")),
                            array('label'=>'Informe Final', 'url'=>array('/informeFinal/adminInforme'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_planificacion_InformeFinal")),
                    )), //Fin Menú Planificacion
                    array('label'=>'Inscripcion','visible'=>Yii::app()->user->checkAccess("menu_procesos_registro"),
                        'items'=>array(
                            array('label'=>'Inscripción', 'url'=>array('/inscripcion/admin'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_registro_Inscripcion")),
                    )), //Fin Menú Inscripcion
                    array('label'=>'Participantes','visible'=>Yii::app()->user->checkAccess("menu_procesos_participantes"),
                        'items'=>array(
                            array('label'=>'Registrar participantes', 'url'=>array('/participante/admin'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_participantes_registro")),
                            array('label'=>'Registrar Certificados', 'url'=>array('/certificados/cargarCertificados'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_participantes_certificado")),
                            array('label'=>'Ver Certificados', 'url'=>array('/certificados/verCertificadosAdmin'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_participantes_ver_certificado_admin")),
                    )), //Fin Menú Participantes
                    array('label'=>'Instructores','visible'=>Yii::app()->user->checkAccess("menu_procesos_instructor"),
                        'items'=>array(
                            array('label'=>'Cartillas', 'url'=>array('/asistencia/reporteAsistencia'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_instructor_impresion_asistencia")),
                            array('label'=>'Registro de Actividades / Informe', 'url'=>array('/temario/adminTemario'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_instructor_registro_actividades")),
//                            array('label'=>'Registro de Asistencia', 'url'=>array('/asistencia/adminAsistencia'),
//                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_instructor_asistencia")),
//                            array('label'=>'Registro de Notas', 'url'=>array('/notas/adminNotas'),
//                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_instructor_notas")),
                    )), //Fin Menú Instructores
                
                    array('label'=>'Financiero','visible'=>Yii::app()->user->checkAccess("menu_procesos_financiero"),
                        'items'=>array(
                            array('label'=>'Pago Inscripción', 'url'=>array('/inscripcion/adminPagoInscripcion'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_financiero_PagoInscripcion")),
                            array('label'=>'Reporte Cierre Inscripciones', 'url'=>array('/inscripcion/cierreDiarioInscripciones'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_financiero_ReporteCierreDiarioInscripciones")),
                            array('label'=>'Reporte Pago Inscripción por Curso', 'url'=>array('/inscripcion/reportePagoInscripcion'),
                                              'visible'=>Yii::app()->user->checkAccess("menu_procesos_financiero_ReportePagoInscripcion")),
                            
                    )), //Fin Menú Registro
					  
                    array('label'=>'Mantenimiento','visible'=>Yii::app()->user->checkAccess("menu_mantenimiento"),
                        'items'=>array(
                            array('label'=>'Empresa', 'url'=>array('/empresa/admin'),
                                            'visible'=>Yii::app()->user->checkAccess("menu_mantenimiento_Empresa")),
                            array('label'=>'Tipo de Evento', 'url'=>array('/tipoEvento/admin'),
                                            'visible'=>Yii::app()->user->checkAccess("menu_mantenimiento_TipoEvento")),
                            array('label'=>'Tipo de Capacitación', 'url'=>array('/tipoCapacitacion/admin'),
                                            'visible'=>Yii::app()->user->checkAccess("menu_mantenimiento_TipoCapacitacion")),    
                            array('label'=>'Estado de Inscripción', 'url'=>array('/estadoInscripcion/admin'),
                                            'visible'=>Yii::app()->user->checkAccess("menu_mantenimiento_EstadoInscripcion")), 
                            array('label'=>'Docentes', 'url'=>array('/docente/admin'),
					    'visible'=>Yii::app()->user->checkAccess("menu_mantenimiento_Docentes")),

                        array('label'=>'Actividades', 'url'=>array('/temario/admin'),
					    'visible'=>Yii::app()->user->checkAccess("menu_mantenimiento_Temario")),



                    )), //Fin de array Menu Mantenimiento
                    array('label'=>'Administrar Usuarios', 'url'=>Yii::app()->user->ui->userManagementAdminUrl
                                    , 'visible'=>Yii::app()->user->checkAccess("menu_administrar_usuarios")),
                        //Fin de array Menu Sistema
                    array('label'=>'Ayuda...', 'url'=>array('/site/about'),
                                    'visible'=>!Yii::app()->user->isGuest),
				
            	))); //Fin de Menu?>
	        </div>
            
                    <div id="wrapper" class="wat-cf">
                             <?php 
                              $flasMessages = Yii::app()->user->getFlashes();
                              if ($flasMessages){
                                  echo '<ul class="flashes">';
                                  foreach ($flasMessages as $key => $message) {
                                   echo '<li><div class="flas-'.$key.'">'.$message."  - ".$key."</div></li>\n";
                                  }
                                  echo '</ul>';
                              }
                             ?>
				<?php echo $content; ?>
			</div>
		</div>
    <p><?php echo Yii::app()->user->ui->displayErrorConsole(); ?></p>
	</body>
</html>