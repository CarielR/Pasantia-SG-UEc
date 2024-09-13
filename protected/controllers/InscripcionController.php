<?php

class InscripcionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Inscripcion'),
		));
	}
        
        public function actionViewInscripcion() {
            $model = new Parametros;
            $reporte=null;
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
                $user=Yii::app()->user->name;
                if ($user==null){
                    $this->redirect(Yii::app()->homeUrl);
                }else{

                    if (isset($_POST['Parametros'])) {
                        $model->attributes = $_POST['Parametros'];

                        $criteria = new CDbCriteria;
                        $criteria->select = 'ins_codigo, par_codigo, ein_codigo,cur_codigo, ins_fecha_inscripcion, ins_pago_valor'; 
                        $criteria->addCondition('t.par_codigo = '.$model->par_persona.';');
                        $inscripcion= Inscripcion::model()->findAll($criteria);
                        $ord=0;    
                       if ($inscripcion== null){
                            Yii::app()->user->setFlash('notice',"Usted aún no se ha registrado en ningún curso");
                        }else{
                                foreach ($inscripcion as $data) {
                                    $reporte[$ord]['curso']=$data->curCodigo->cur_nombre;
                                    $reporte[$ord]['participante']=$data->parCodigo->par_apellido_participante." ".$data->parCodigo->par_nombre_participante;                        
                                    $reporte[$ord]['fecha']=$data->ins_fecha_inscripcion;
                                    $reporte[$ord]['estado']=$data->einCodigo->ein_nombre;
                                    $reporte[$ord]['valor']=$data->curCodigo->cur_costo;
                                    $reporte[$ord]['codigoInscripcion']=$data->ins_codigo;
                                    $ord++;
                                }
                        }
                    }
                    //mensajes flash
                    //Yii::app()->user->setFlash('notice',"Ya se encuentra registrado, por favor revise las instrucciones para la Inscripción");
                    $this->render('viewInscripcion', array(
                            'model' => $model, 'reporte' => $reporte));
                }
            }
	}

        //Procesos para la sección de Finanzas
        public function actionViewPagoInscripcion($id) {
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
                    $this->render('viewPagoInscripcion', array(
                            'model' => $this->loadModel($id, 'Inscripcion'),
                    ));

            }
	}
        
	public function actionCreate() {
		$model = new Inscripcion;

                if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
                    if (isset($_POST['Inscripcion'])) {
                            $model->attributes = $_POST['Inscripcion'];

                            if ($model->save()) {
                                    if (Yii::app()->request->isAjaxRequest)
                                            Yii::app()->end();
                                    else
                                            $this->redirect(array('view', 'id' => $model->ins_codigo));
                            }
                    }

                    $this->render('create', array( 'model' => $model));
                }
	}

        //Creación de Inscripción por Estudiante
        public function actionCreateInscripcion() {
		$model = new Inscripcion;

		if (isset($_POST['Inscripcion'])) {
			$model->attributes = $_POST['Inscripcion'];

                        $curso=$model->cur_codigo;
                        $participante=$model->par_codigo;
                        
                        $criteria = new CDbCriteria;
                        $criteria->select = 'ins_codigo'; 
                        $criteria->addCondition('t.cur_codigo = '.$curso);
                        $criteria->addCondition('t.par_codigo = '.$participante);
                        $inscripcion= Inscripcion::model()->findAll($criteria);
                        
                        if ($inscripcion !=null){
                            Yii::app()->user->setFlash('notice',"Ya se encuentra inscrito en el curso, por favor revise su Inscripción");
                        }else{
                            if ($model->save()) {
                                    if (Yii::app()->request->isAjaxRequest)
                                            Yii::app()->end();
                                    else
                                            $this->redirect(array('viewInscripcion'));
                            }
                        }
		}

		$this->render('createInscripcion', array( 'model' => $model));
	}
        
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Inscripcion');

                if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{

		if (isset($_POST['Inscripcion'])) {
			$model->attributes = $_POST['Inscripcion'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->ins_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
        }
        
                        }

        //Registro del pago por parte de la Sección de Finanzas
        public function actionUpdatePagoInscripcion($id,$cur) {
            $model = $this->loadModel($id, 'Inscripcion');

            $this->performAjaxValidation($model, 'inscripcion-form');

            if (Yii::app()->user->isGuest) {
                $this->redirect(Yii::app()->homeUrl);

            }else{
                $model->ins_pago_auditoria=Yii::app()->user->name;
		if (isset($_POST['Inscripcion'])) {
			$model->attributes = $_POST['Inscripcion'];

			if ($model->save()) {
				$this->redirect(array('viewPagoInscripcion', 'id' => $model->ins_codigo));
			}
		}
		// Verificar Costos de inscripción                
                $curso=Cursos::model()->findByPk($cur);
                $costoInscripcion=$curso->cur_costo;
                
                $this->render('updatePagoInscripcion', array('model' => $model,'costoInscripcion' => $costoInscripcion));
            }
	}
        
	public function actionDelete($id) {
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Inscripcion')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
            Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
            }
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Inscripcion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Inscripcion('search');
		$model->unsetAttributes();
                if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
                    if (isset($_GET['Inscripcion']))
                            $model->attributes = $_GET['Inscripcion'];

                    $this->render('admin', array(
                            'model' => $model,
                    ));
                }
	}
        
        //Visualización de los Participantes para la sección de Finanzas
        public function actionAdminPagoInscripcion() {
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
		$model = new Inscripcion('search_no_pagados');
		$model->unsetAttributes();

		if (isset($_GET['Inscripcion']))
			$model->attributes = $_GET['Inscripcion'];

		$this->render('adminPagoInscripcion', array(
			'model' => $model,
		));
            }
        
        }

	public function actionIndex() {
		$model = new Inscripcion('search');
		$model->unsetAttributes();
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
		if (isset($_GET['Inscripcion']))
			$model->attributes = $_GET['Inscripcion'];

		$this->render('admin', array(
			'model' => $model,
		));
            }
         }

         public function actionIndexPagoInscripcion() {
		$model = new Inscripcion('search_no_pagados');
		$model->unsetAttributes();
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
		if (isset($_GET['Inscripcion']))
			$model->attributes = $_GET['Inscripcion'];

		$this->render('adminPagoInscripcion', array(
			'model' => $model,
		));
            }
        }
       
    
        //Impresión de la Inscripción
        public function actionImprimir($id) {
            $model = $this->loadModel($id, 'Inscripcion');
        if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{    
            //INSCRIPCION
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.ins_codigo = '.$id.';');
            $reporte= Inscripcion::model()->findAll($criteria);
            
            //CURSO
            $criteriaPlan = new CDbCriteria;
            $criteriaPlan->addCondition('t.cur_codigo = '.$model->cur_codigo.';');
            $curso= Cursos::model()->findAll($criteriaPlan);
            
            //PLANIFICACION
            $criteriaPlan = new CDbCriteria;
            $criteriaPlan->addCondition('t.pla_codigo = '.$curso[0]->pla_codigo.';');
            $planificacion= Planificacion::model()->findAll($criteriaPlan);
            
            //TIPO CAPACITACION
            $capacitacion= TipoCapacitacion::model()->findAll();
            
            //TIPO EVENTO
            $evento= TipoEvento::model()->findAll();

            
            
            //Valores de Configuración del Reporte
            $nombre_reportes='FICHA DE INSCRIPCIÓN';
            //Nombre Planificacion
            $nombrePlanificacion=$planificacion[0]->pla_nombre;
            $nombreCurso=$model->curCodigo->cur_nombre;
            $tipoCapacitacion=$planificacion[0]->tcaCodigo->tca_nombre;
            $tipoEvento=$planificacion[0]->tevCodigo->tev_nombre;
            $fechaInicio=$planificacion[0]->pla_fecha_inicio;
            $fechaFin=$planificacion[0]->pla_fecha_inicio;
            $lugarCurso=$planificacion[0]->pla_lugar;
            $codigoCurso=$planificacion[0]->pla_curso_codigo;
            $cab_reporte3='';
            $det_reporte3='';
            $cedula=$reporte[0]->parCodigo->par_cedula_participante;
            //Valores para Firmas de Pagina - NO APLICA
            //$empresa = Empresa::model()->findAll();
            //$firma_realizado=$empresa[0]->emp_firma_encargado;
            //$pie_realizado=$empresa[0]->emp_pie_encargado;
            //$firma_revisado=$empresa[0]->emp_firma_pedagogico;
            //$pie_revisado=$empresa[0]->emp_pie_pedagogico;

            $pdf = Yii::createComponent('application.extensions.MPDF54.mpdf');
            // <!-- TABLA DE DATOS DESPLEGADOS -->
            $ord=1;
            if($reporte!=null){ 
            //Encabezado; nombre del reporte
            
            $header.='<div align="center"> ';
            $header.='<img src="http://webltga.espe.edu.ec/sg-uec/images/encabezadoUnidadEC.png">';
            $header.='<br><br><br>';
            $header.='</div> ';
                
            // Tabla de Descripcion de resultados
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<th align="center" colspan="5"><b> '.$nombre_reportes.'</b></th> ';
            $html.='	</tr> ';
            $html.='	<tr> ';
            $html.='	  	<td align="left" colspan="5" style="background-color:rgb(217,217,217)"> 1.- DATOS GENERALES </td> ';
            $html.='	</tr> ';
            $html.='	<tr> ';
            $html.='		<td align="left" colspan="5"><b> PROGRAMA: </b>'.$nombrePlanificacion.'</td> ';
            $html.='	</tr><tr>';
            $html.='	  	<td align="left" colspan="5"><b> CURSO: </b>'.$nombreCurso.'</td>' ;
            $html.='	</tr><tr>';
            $html.='		<td align="left" colspan="1" rowspan="3"><b> TIPO DE CAPACITACION:</b></td> ';
            foreach ($capacitacion as $data){
            $html.='		<td colspan="3"> '.$data->tca_nombre.'</td> ';
                if ($data->tca_nombre == $tipoCapacitacion){
                    $html.='    <td align="center" colspan="1"> X </td> ';
                }else{
                    $html.='	<td align="center" colspan="1">  </td> ';
                }
            $html.='	</tr><tr>';
            }
            $html.='	</tr><tr>';
            $html.='		<td align="left" colspan="2"><b> FECHA INICIO:  </b>'.$fechaInicio.'</td> ';
            $html.='		<td align="left" colspan="3"><b> FECHA FIN: </b>'.$fechaFin.'</td> ';
            $html.='	</tr><tr>';
            $html.='		<td align="left" colspan="5"><b> LUGAR DEL CURSO:</b> '.$lugarCurso.' </td> ';
            $html.='	</tr><tr>';
            $html.='		<td align="left" colspan="1" rowspan="4"><b> TIPO DE EVENTO:</b></td> ';
            $band=0;
            foreach ($evento as $data){
            $html.='		<td colspan="2"> '.$data->tev_nombre.'</td> ';
                if ($data->tev_nombre == $tipoEvento){
                    $html.='    <td align="center" colspan="1"> X </td> ';
                }else{
                    $html.='	<td align="center" colspan="1">  </td> ';
                }
                $band++;
                if ($band==1)
                    $html.='		<td align="left" rowspan="4" colspan="1"><b> CODIGO DEL CURSO:</b> '.$codigoCurso.'</td> ';
            $html.='	</tr><tr>';
            }
            $html.='	</tr>';
            
//            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div> ';
            $html.='<br><br><br> ';
            // Tabla de Datos Personales del Participante
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td colspan="4" align="left" style="background-color:rgb(217,217,217)"> 2.- DATOS PERSONALES</td> ';
            $html.='	</tr> ';
            $html.='	<tr> ';
            $html.='		<td colspan="1" align="left" width="30%"><b><font face="Rockwell"> NOMBRES Y APELLIDOS: </b></td><td width="70%" colspan="3">'.$reporte[0]->parCodigo->par_nombre_participante.' '.$reporte[0]->parCodigo->par_apellido_participante.'</font></td> ';
            $html.='	</tr><tr>';
            $html.='	  	<td colspan="1" align="left"><b> CÉDULA: </b></td><td width="70%" colspan="3">'.$reporte[0]->parCodigo->par_cedula_participante.'</td>' ;
            $html.='	</tr><tr>';
            $html.='		<td align="left" colspan="1" rowspan=2><b> TIPO DE PARTICIPANTE:</b></td> ';
            if ($reporte[0]->parCodigo->par_tipo_participante == "INTERNO"){
                $html.='		<td  align="left"> INTERNO</td> ';
                $html.='		<td  align="center"> X </td> ';
                $html.='		<td  align="left"> </td>';
                $html.='</tr><tr>       <td  align="left"> EXTERNO </td> ';
                $html.='		<td  align="left"> </td>';
                $html.='		<td  align="left"> </td>';
            }else{
                $html.='		<td  align="left"> INTERNO</td> ';
                $html.='		<td  align="left">  </td> ';
                $html.='		<td  align="left"> </td>';
                $html.='</tr><tr>       <td  align="left"> EXTERNO </td> ';
                $html.='		<td  align="center"> X </td>';
                $html.='		<td  align="left"> </td>';
            }
            $html.='	</tr><tr>';
            $html.='		<td colspan="1" align="left"><b> CORREO ELECTRÓNICO:</b></td><td width="70%" colspan="3">'.$reporte[0]->parCodigo->par_correo_participante.'</td> ';
            $html.='	</tr><tr>';
            $html.='		<td colspan="1" align="left"><b> TELÉFONO FIJO:</b></td><td width="70%" colspan="3">'.$reporte[0]->parCodigo->par_convencional.' </td> ';
            $html.='	</tr><tr>';
            $html.='		<td colspan="1" align="left"><b> TELÉFONO CELULAR:</b></td><td width="70%" colspan="3">'.$reporte[0]->parCodigo->par_celular.' </td> ';
            $html.='	</tr><tr>';
            $html.='		<td colspan="1" align="left"><b> FECHA DE INSCRIPCIÓN:</b></td><td width="70%" colspan="3">'.$reporte[0]->ins_fecha_inscripcion.' </td> ';
            $html.='	</tr><tr>';
            $html.='		<td colspan="1" align="left"><b> GRUPO - HORARIO:</b></td><td width="70%" colspan="3">'.$reporte[0]->gruCodigo->gru_nombre.' '.$reporte[0]->gruCodigo->gru_horario.'</td> ';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div> ';
            // Pies de firmas del Reporte
            $html.=' <br><br><br><br><br><br>';
            $html.='<table width="100%" border="0" align="center"> ';
            $html.='	<tr> ';
            $html.='		<th align="center" width="50%">____________________________</th> ';
            $html.='	</tr> ';
            $html.='	<tr> ';
            $html.='		<th align="center" width="50%">'.$reporte[0]->parCodigo->par_nombre_participante.' '.$reporte[0]->parCodigo->par_apellido_participante.'</th> ';
            $html.='	</tr> ';
            $html.='</table> ';
	} 
	$mpdf=new mPDF('win-1252','A4',11,'',10,10,40,20,5,10); // Hoja A4; Font-size=11; left-rigth....
	$mpdf->SetHTMLHeader($header);
	$mpdf->WriteHTML($html);
	$mpdf->SetFooter(' sg-uec-espe-l | Página {PAGENO}/{nb}|{DATE j/m/Y}');
	$mpdf->Output('registroInscripcion.pdf','D');
	exit;
            
        }}
        
        //REPORTES FINANCIERO
        //CIERRE DIARIO DE INSCRIPCIONES
        public function actionCierreDiarioInscripciones() {
		$model=new Parametros; //Modelo para la toma de parametros
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{	
                $criteriaCurso=new CDbCriteria; //Criterios para la seleccion de los datos
		$criteriaCurso->order='cur_codigo desc';
		$listaCurso=  Cursos::model()->findAll($criteriaCurso);
                
		if(isset($_POST['Parametros'])) 
                {
                        $model->attributes=$_POST['Parametros']; 
                }
		else 
		{	$model->cur_codigo=$listaCurso[0]->cur_codigo; 
			$model->par_fecha_ini=date("Y-m-d");
			$model->par_opcion='Fecha';	
                } //Valores por defecto para primera corrida
		
		$criteria=new CDbCriteria; //Criterios para la seleccion de los datos
		$criteria->with = array('parCodigo');  //Nombre de la relacion del Modelo
		if ($model->par_opcion=='Fecha')
		{	$criteria->compare('ins_fecha_pago_inscripcion',$model->par_fecha_ini,true);}
                $criteria->order='parCodigo.par_apellido_participante,parCodigo.par_nombre_participante';
		$reporte = Inscripcion::model()->findAll($criteria);
                
		$this->render('cierreDiarioInscripciones', array('reporte' => $reporte,'model' => $model));
            }
        }
        
        
        public function actionCierreDiarioInscripcionesPdf()
        {	
                  ////Valores de Configuración del Reporte
		$nombre_reportes='CIERRE DIARIO DE INSCRIPCIONES';
		$cab_reporte1='';  //Verificar llenado de todos
		$det_reporte1='';
		$cab_reporte2='';
		$det_reporte2='';
		$cab_reporte3='';
		$det_reporte3='';
		
		//Valores para Firmas de Pagina
		$lista_empresa = Empresa::model()->findAll();
		//$firma_realizado=$lista_empresa[0]->emp_firma_recaudacion;
		//$pie_realizado=$lista_empresa[0]->emp_pie_recaudacion;
		//$firma_revisado=$lista_empresa[0]->emp_firma_pagaduria;
		//$pie_revisado=$lista_empresa[0]->emp_pie_pagaduria;
		
                $reporte=unserialize(base64_decode($_POST['reporte']));
                $fecha=$_POST['par_fecha_ini'];
                
                
		//Valores para encabezado
		if($reporte!=null){
			$cab_reporte1='FECHA PAGO';
			$det_reporte1=$fecha;
		}
		
		$pdf = Yii::createComponent('application.extensions.MPDF54.mpdf');
		// <!-- TABLA DE DATOS DESPLEGADOS -->
		$ord=1;
		if($reporte!=null){ 
		//Encabezado; nombre del reporte
                $header.='<div align="center"> ';
                $header.='<img src="http://webltga.espe.edu.ec/sg-uec/images/encabezadoUnidadEC.png">';
                $header.='<br><br>';
                $header.='</div> ';
                    //Contenido del Reporte
                $html.='<br><h3 align="center">CIERRE DE INSCRIPCIONES</h3> ';
                $html.='<table width="100%" border="1" align="center"> ';
		$html.='	<tr> ';
		$html.='		<th align="center" width="10%">ORD.</th> ';
		$html.='		<th align="center" width="15%">CEDULA</th> ';
		$html.='	  	<th align="left" width="40%">NOMBRE</th> ';
                $html.='	  	<th align="left" width="40%">CURSO</th> ';
		$html.='	  	<th align="center" width="15%">VALOR</th> ';
		$html.='		<th align="center" width="20%">FECHA</th> ';
		$html.='	</tr> ';
		$html.='</table> ';
		$html.='<table width="100%" border="1" align="center"> ';
		$total=0;
		foreach($reporte as $data) { 
			$html.='	<tr> ';
			$html.='		<td align="center" width="10%"> '. $ord++. '</td> ';
			$html.='		<td align="center" width="15%"> '. $data->parCodigo->par_cedula_participante. '</td> ';
			$html.='		<td align="left" width="40%"> '. $data->parCodigo->par_apellido_participante.' '.$data->parCodigo->par_nombre_participante. '</td> ';
			$html.='		<td align="center" width="40%"> '. $data->curCodigo->cur_nombre. '</td> ';
                        $html.='		<td align="center" width="15%"> '. $data->ins_pago_valor. '</td> ';
			$html.='		<td align="center" width="20%"> '. substr($data->ins_fecha_pago_inscripcion,0,10) .'</td> ';
			$html.='  </tr> ';
			$total=$total+$data->ins_pago_valor;
		} 
		$html.='	<tr> ';
		$html.='		<td colspan="3" align="center" width="65%"> '. '<b>TOTAL</b>' .'</td> ';
		$html.='		<td align="center" width="15%"> '.''.'</td> ';
                $html.='		<td align="center" width="15%"> <b>'. $total. '</b></td> ';
                $html.='		<td align="center" width="20%"> '.''.'</td> ';
		$html.='  </tr> ';
 		$html.=' </table> ';
		// Pies de firmas del Reporte PREGUNTAR SI APLICA
		$html.=' <br>';
		$html.='<table width="100%" border="0" align="center"> ';
//		$html.='	<tr> ';
//		$html.='		<th align="center" width="50%">REALIZADO POR:<br><br><br><br><br><br></th> ';
//		$html.='		<th align="center" width="50%">REVISADO POR:<br><br><br><br><br><br></th> ';
//		$html.='	</tr> ';
//		$html.='	<tr> ';
//		$html.='		<td align="center" width="50%">'.$firma_realizado.'<br>'.$pie_realizado.'</th> ';
//		$html.='		<td align="center" width="50%">'.$firma_revisado.'<br>'.$pie_revisado.'</th> ';
//		$html.='	</tr> ';
		$html.='</table> ';
	} 
	$mpdf=new mPDF('win-1252','A4',11,'',10,10,40,20,5,10); // Hoja A4; Font-size=11; left-rigth....
	$mpdf->SetHTMLHeader($header);
	$mpdf->WriteHTML($html);
	$mpdf->SetFooter(' sg-uec-espe-l | Página {PAGENO}/{nb}|{DATE j/m/Y H:m:s}');
	$mpdf->Output('cierreDiarioInscripciones.pdf','D');
	exit;
    }
    
}