<?php

class PlanificacionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Planificacion'),
		));
	}
        
        public function actionMenuPlanificacion() {
		
            $model = new Parametros;
            $reporte=null;
            
            if (Yii::app()->user->isGuest){
                $this->redirect(Yii::app()->homeUrl);
            }else{
                if (isset($_POST['Parametros'])) {
                    $model->attributes = $_POST['Parametros'];
                    
                    $criteria = new CDbCriteria;
                    $criteria->select = '*'; 
                    $criteria->addCondition('t.pla_codigo = '.$model->pla_codigo.';');                    
                    $planificacion= Planificacion::model()->findAll($criteria);
                    $ord=0;    
                   if ($planificacion== null){
                        Yii::app()->user->setFlash('notice',"Usted no ha creado ninguna Planificacion".$model->pla_codigo);
                    }else{
                            foreach ($planificacion as $data) {
                                $reporte[$ord]['programa']=$data->pla_programa;
                                $reporte[$ord]['curso']=$data->pla_nombre;                        
                                $reporte[$ord]['fecha']=$data->pla_fecha;
                                $reporte[$ord]['tipoCapacitacion']=$data->tcaCodigo->tca_nombre;
                                $reporte[$ord]['tipoEvento']=$data->tevCodigo->tev_nombre;
                                $ord++;
                            }
                    }
		}
                //mensajes flash
                //Yii::app()->user->setFlash('notice',"Ya se encuentra registrado, por favor revise las instrucciones para la Inscripción");
		$this->render('menuPlanificacion', array(
			'model' => $model, 'reporte' => $reporte));
            }
	}

	public function actionCreate() {
		$model = new Planificacion;


		if (isset($_POST['Planificacion'])) {
                    $model->attributes = $_POST['Planificacion'];


                    //Cambiar a mayusculas 
                    //Nombre de la Planificacion
                    //Nombre del Curso
                    $model->pla_nombre= strtoupper($model->pla_nombre);
                    $model->pla_programa= strtoupper($model->pla_programa);
                    $model->pla_pie_supervisado= strtoupper($model->pla_pie_supervisado);
                        
                    if (Yii::app()->user->isGuest) {
                        $this->redirect(Yii::app()->homeUrl);
                    }else{
                    
                    //CAMPOS PARA LA AUDITORIA 
                    $model->pla_creado_por=Yii::app()->user->name;
                    $model->pla_modificado_por=Yii::app()->user->name;
                    $model->pla_fecha_creacion=date("Y-m-d");
                    $model->pla_fecha_modificacion=date("Y-m-d");  
                    $model->pla_certificacion_presupuestaria = 0;
                    $model->pla_instructivo = 0;

                     //DatosGenerales
                    $model->pla_certificacion_presupuestaria = 0;
                    $model->pla_instructivo = 0;

                    //PanelAcademico
                    $model->pla_metodologia = 0;

                    //PanelAdministrativo
                    $model->pla_presupuesto = 0;
                    $model->pla_disposiciones = 0;
                      
                        
			if ($model->save()) {
                            
                            //Registrar los datos de la Planificación al Curso
                            //Campos a copiar
                            //Curso Nombre - Curso Fecha Planificacion - Curso Objetivo - Codigo del Curso
                            $sql="INSERT INTO cursos 
                                    (pla_codigo,cur_nombre, cur_fecha_planificacion, cur_codigo_curso, cur_objetivo, 
                                    cur_firma_realiza, cur_pie_firma, cur_creado_por, cur_fecha_creacion,
                                    cur_modificado_por, cur_fecha_modificacion)
                                     values ('".$model->pla_codigo."',
                                            '".$model->pla_nombre."',
                                            date('".$model->pla_fecha."'),
                                            '".$model->pla_curso_codigo."',
                                            '".$model->pla_objetivo."',
                                            '".$model->pla_firma_supervisado."',
                                            '".$model->pla_pie_supervisado."',
                                            '".$model->pla_creado_por."',
                                            date('".$model->pla_fecha_creacion."'),
                                            '".$model->pla_modificado_por."',
                                            date('".$model->pla_fecha_modificacion."'))";
                            
                            $comando = Yii::app() -> db -> createCommand($sql);
                            $comando -> execute();                                                       
				
                            if (Yii::app()->request->isAjaxRequest)
                            	Yii::app()->end();
                            else
				$this->redirect(array('view', 'id' => $model->pla_codigo));
			}
                    }
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdatePlanificacion($id) {
            
            
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);

            }else{            
                    $criteria=new CDbCriteria;
                    $criteria->addCondition('pla_codigo='.$id);
                    $planificacion = Planificacion::model()->findAll($criteria);
                if ($planificacion[0]->pla_creado_por == null){
                        $model = new Planificacion;
                        $model->pla_creado_por=Yii::app()->user->name;
                        $model->pla_modificado_por=Yii::app()->user->name;
                        $model->pla_fecha_creacion=date("Y-m-d");
                        $model->pla_fecha_modificacion=date("Y-m-d");
                        $sql="UPDATE planificacion SET pla_creado_por='".$model->pla_creado_por."', pla_modificado_por='".$model->pla_modificado_por."',
                                                pla_fecha_creacion=date('".$model->pla_fecha_creacion."'), pla_fecha_modificacion=date('".$model->pla_fecha_modificacion."') WHERE pla_codigo='".$id."'";

                        $comando = Yii::app() -> db -> createCommand($sql);
                        $comando -> execute();
                    }else{
                        $model = new Planificacion;
                        $model->pla_modificado_por=Yii::app()->user->name;
                        $model->pla_fecha_modificacion=date("Y-m-d");
                        $sql="UPDATE planificacion SET pla_modificado_por='".$model->pla_modificado_por."', pla_fecha_modificacion=date('".$model->pla_fecha_modificacion."') WHERE pla_codigo='".$id."'";
                        $comando = Yii::app() -> db -> createCommand($sql);
                        $comando -> execute();
                    }
                
		$model = $this->loadModel($id, 'Planificacion');


		if (isset($_POST['Planificacion'])) {
			$model->attributes = $_POST['Planificacion'];

			if ($model->save()) {
                            //Registrar los datos de la Planificación al Curso
                            
                            //Seleccionar el curso al cual se va a actualizar la cabecera
                            $sql="SELECT cur_codigo FROM cursos WHERE pla_codigo = '".$id."';";
                            $curso=Yii::app()->db->createCommand($sql)->queryAll();
                            //Campos a actualizar                            
                            //Curso Nombre - Curso Fecha Planificacion - Curso Objetivo - Codigo del Curso
                            $sql="UPDATE cursos 
                                    SET cur_nombre = '".$model->pla_nombre."',
                                        cur_fecha_planificacion = date('".$model->pla_fecha."'),
                                        cur_codigo_curso = '".$model->pla_curso_codigo."',
                                        cur_objetivo = '".$model->pla_objetivo."',
                                        cur_firma_realiza = '".$model->pla_firma_supervisado."',
                                        cur_pie_firma = '".$model->pla_pie_supervisado."'
                                    WHERE cur_codigo='".$curso[0]['cur_codigo']."'";
                            $comando = Yii::app() -> db -> createCommand($sql);
                            $comando -> execute();                                                       
			
                            $this->redirect(array('view', 'id' => $model->pla_codigo));
			}
		}

		$this->render('update', array('model' => $model,));
            }
	}

        
        public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Planificacion');
		if (isset($_POST['Planificacion'])) {
			$model->attributes = $_POST['Planificacion'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->pla_codigo));
			}
		}
		$this->render('update', array('model' => $model,));
	}
        
        
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Planificacion')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Planificacion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Planificacion('search');
		$model->unsetAttributes();

		if (isset($_GET['Planificacion']))
			$model->attributes = $_GET['Planificacion'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionAdminPlanificacion() {
		$model = new Planificacion('search');
		$model->unsetAttributes();

		if (isset($_GET['Planificacion']))
			$model->attributes = $_GET['Planificacion'];

		$this->render('adminPlanificacion', array(
			'model' => $model,
		));
	}
        
        
        
        public function actionOpcionesPlanificacion() {
		$model = new Planificacion('search');
		$model->unsetAttributes();

		if (isset($_GET['Planificacion']))
			$model->attributes = $_GET['Planificacion'];

		$this->render('opcionesPlanificacion', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Planificacion('search');
		$model->unsetAttributes();

		if (isset($_GET['Planificacion']))
			$model->attributes = $_GET['Planificacion'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

        
        public function actionImprimirPlanificacion($id) {
            $model = $this->loadModel($id, 'Planificacion');
            
            //CURSO
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.pla_codigo = '.$model->pla_codigo.';');
            $curso= Cursos::model()->findAll($criteria);
            
            //TIPO CAPACITACION
            $capacitacion= TipoCapacitacion::model()->findAll();
            
            //TIPO EVENTO
            $evento= TipoEvento::model()->findAll();

            
            //Valores de Configuración del Reporte
            $nombre_reportes='PLANIFICACIÓN DEL CURSO';
            //Nombre Planificacion
            $nombrePlanificacion=$model->pla_nombre;
            $nombreCurso=$curso[0]->cur_nombre;
            $tipoCapacitacion=$model->tcaCodigo->tca_nombre;
            $tipoEvento=$model->tevCodigo->tev_nombre;
            $fechaInicio=$model->pla_fecha_inicio;
            $fechaFin=$model->pla_fecha_fin;
            $lugarCurso=$model->pla_lugar;
            $codigoCurso=$model->pla_curso_codigo;

            //Validacion de Planificacion
            // Como validar que la planificacion haya sido completada
            // ????????????
            // Validacion del Instructor Propuesto (si es uno o varios)
            
            //Validacion de Objetivos Específicos
            //OBJETIVO ESPECIFICO
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.pla_codigo = '.$model->pla_codigo.';');
            $objetivosEsp= ObjetivosEspecificos::model()->findAll($criteria);
            $numeroObjetivosEsp=count($objetivosEsp);
            
            //Validacion de Temario
            //Temas y subtemas
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.pla_codigo = '.$model->pla_codigo.';');
            $temario= Temario::model()->findAll($criteria);
            $numeroTemas=count($temario);
            
            if (($numeroObjetivosEsp<=0) || ($numeroTemas<=0)){
                Yii::app()->user->setFlash('notice',"Usted no ha registrado todos los datos de la Planificación");
                $this->render('opcionesPlanificacion', array('model' => $model,));
            }else{
                
            
            
            
            //Valores para Firmas de Pagina - APLICA
            $empresa = Empresa::model()->findAll();
            $firma_jefe=$empresa[0]->emp_firma_jefe;
            $pie_jefe=$empresa[0]->emp_pie_jefe;
            $firma_director=$empresa[0]->emp_firma_director_espel;
            $pie_director=$empresa[0]->emp_pie_director_espel;
            $pie_director2=$empresa[0]->emp_pie2_director_espel;

            $pdf = Yii::createComponent('application.extensions.MPDF54.mpdf');
            // <!-- TABLA DE DATOS DESPLEGADOS -->
            $ord=1;
            if($curso!=null){ 
            //Encabezado; nombre del reporte
            
            $header.='<div align="center"> ';
            $header.='<img src="http://webltga.espe.edu.ec/sg-uec/images/encabezadoUnidadEC.png">';
            $header.='<br><br><br>';
            $header.='</div> ';
                
            // Tabla Cabecera para los reportes 1- Datos Generales del Curso
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<th align="center" colspan="5"><b> '.$nombre_reportes.'</b></th> ';
            $html.='	</tr> ';
            $html.='	<tr> ';
            $html.='	  	<td align="left" colspan="5" style="background-color:rgb(217,217,217)"><b> 1.- DATOS GENERALES </b></td> ';
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
            $html.='	</table> ';
            $html.='</div> <br>';
            // Tabla 2- Datos Académicos
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td colspan="2" align="left" style="background-color:rgb(217,217,217)"><b> 2.- ACADÉMICO</b></td> ';
            $html.='	</tr> ';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> ANTECEDENTES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$model->pla_antecedentes.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='	  	<td colspan="2" align="center"><b> OBJETIVO Y TEMARIO </b></td> ';
            $html.='	</tr><tr>';
            $html.='		<td align="left" width="30%"><b> OBJETIVO GENERAL: </b></td>';
            $html.='		<td align="justify" width="70%"> '.$model->pla_objetivo.'</td>';
            $html.='	</tr><tr>';
            $html.='		<td align="left" rowspan="'.$numeroObjetivosEsp.'" width="30%"><b> OBJETIVOS ESPECIFICOS: </b></td>';
            foreach ($objetivosEsp as $data){
                $html.='		<td align="left" width="70%"> '.$data->obj_especifico.'</td> ';
                $html.='	</tr><tr>';
            }
            $html.='	</tr><tr>';
            $html.='		<td align="left" width="30%"><b> METODOLOGÍA: </b></td>';
            $html.='		<td align="justify" width="70%"> '.$model->pla_metodologia.' </td>';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div> ';
            // Tabla Temario
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td align="center" width="15%"><b> ORD. </b></td> ';
            $html.='	  	<td align="center" width="70%"><b> CONTENIDO DEL CURSO: TEMAS Y ACTIVIDADES </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> Nº HORAS </b></td> ';
            $html.='	</tr><tr>';
            $ordTema=0;
            $totalHorasPlanificadas=0;
            $totalHorasActPlanificadas=0;
            foreach ($temario as $tema) {
                //Temas-Contenido
                $criteria = new CDbCriteria;
                $criteria->addCondition('t.tem_codigo = '.$tema->tem_codigo.';');
                $subTema= Contenido::model()->findAll($criteria);
                foreach ($subTema as $data) {
                    $html.='        <td align="center" width="15%"> '.++$ordTema.'</td>';
                    $html.='        <td align="center" width="70%"> '.$data->temCodigo->tem_nombre.': '.$data->con_nombre.'</td>';
                    $html.='        <td align="center" width="15%"> '.$data->con_horas_planificadas.' Horas</td>';
                    $totalHorasPlanificadas=$totalHorasPlanificadas+$data->con_horas_planificadas;
                    $totalHorasActPlanificadas=$totalHorasActPlanificadas+$data->con_horas_act_planificadas;
                    $html.='	</tr><tr>';
                }
            }
            $html.='	</tr><tr> ';
            $html.='	  	<td colspan="2" align="center" width="85%"><b> TOTAL HORAS PLANIFICADAS </b></td> ';
            $html.='	  	<td align="center" width="15%"> '.$totalHorasPlanificadas.' HORAS </td> ';
            $html.='	</tr><tr>';
            $html.='	</tr><tr> ';
            $html.='	  	<td colspan="2" align="center" width="85%"><b> TOTAL HORAS ACTIVIDADES DOCENTE </b></td> ';
            $html.='	  	<td align="center" width="15%">'.$totalHorasActPlanificadas.' HORAS </td> ';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div> <br>';
            $ordAnexo=0;
            // Tabla 3- Anexo
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td colspan="2" align="left" style="background-color:rgb(217,217,217)"><b> 3.- ANEXOS</b></td> ';
            $html.='	</tr> ';
            //Anexos - Planificacion
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.pla_codigo = '.$model->pla_codigo.';');
            $anexo= Anexos::model()->findAll($criteria);
            foreach ($anexo as $data) {
                $html.='    <tr>';
                $html.='        <td align="letf" width="100%"> '.++$ordAnexo.'.- '.$data->ane_nombre.'</td>';
                $html.='    </tr><tr>';
            }
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div><br> ';            

            // Tabla 4- Administrativo
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td colspan="2" align="left" style="background-color:rgb(217,217,217)"><b> 4.- ADMINISTRATIVO</b></td> ';
            $html.='	</tr><tr> ';
            $html.='	  	<td colspan="2" align="center"><b> PRESUPUESTO PLANIFICADO: '.$model->pla_presupuesto.' </b></td> ';
            $html.='	</tr><tr> ';
            $html.='	  	<td align="center" width="30%"><b> DISPOSICIONES GENERALES: </b></td> ';
            $html.='	  	<td align="justify" width="70%"> '.$model->pla_disposiciones.' </td> ';
            $html.='	</tr>';
            $html.='</table> ';
            $html.='</div>';
            
            // Tabla Firmas de Responsabilidad
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="0" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td align="center" ><b> FIRMAS DE RESPONSABILIDAD:</b></td> ';
            $html.='	  	<td></td> ';
            $html.='	  	<td></td> ';
            $html.='	<br><br><br><br><br><br><br><br><br><br>';
            $html.='	</tr><tr> ';
            $html.='	  	<td align="center" width="40%">________________________________</td> ';
            $html.='	  	<td></td> ';
            $html.='	  	<td align="center" width="40%">________________________________</td> ';
            $html.='	</tr><tr> ';
            $html.='	</tr><tr> ';
            $html.='	  	<td align="center" width="40%">'.$model->pla_firma_supervisado.'</td> ';
            $html.='	  	<td></td> ';
            $html.='	  	<td align="center" width="40%">'.$firma_jefe.'</td> ';
            $html.='	</tr><tr> ';
            $html.='	  	<td align="center" width="40%"><b> '.$model->pla_pie_supervisado.'</b> </td> ';
            $html.='	  	<td></td> ';
            $html.='	  	<td align="center" width="40%"><b> '.$pie_jefe.' </b></td> ';
            $html.='	</tr><tr> ';
            $html.='	</tr>';
            $html.='</table> ';
            $html.='</div><br> ';
            
	} 
	$mpdf=new mPDF('win-1252','A4',11,'',10,10,40,20,5,10); // Hoja A4; Font-size=11; left-rigth....
	$mpdf->SetHTMLHeader($header);
	$mpdf->WriteHTML($html);
	$mpdf->SetFooter(' sg-uec-espe-l | Página {PAGENO}/{nb}|{DATE j/m/Y}');
	$mpdf->Output('Planificacion.pdf','D');
	exit;
            
	}
        
        }
        
}