<?php

class InformeFinalController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'InformeFinal'),
		));
	}

	public function actionCreate() {
		$model = new InformeFinal;


		if (isset($_POST['InformeFinal'])) {
			$model->attributes = $_POST['InformeFinal'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->inf_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        //Informe Final por Instructor
        public function actionCreateInforme($id) {
            
            //-----VALIDACIONES------//
            //Cargar Modelo Temario
            $criteriaTema = new CDbCriteria;
            $criteriaTema->addCondition("t.tem_codigo = $id;");
            $temario= Temario::model()->findAll($criteriaTema);

            //Cargar Modelo Curso
            $criteriaCurso = new CDbCriteria;
            $criteriaCurso->addCondition("t.pla_codigo =".$temario[0]->pla_codigo);
            $curso= Cursos::model()->findAll($criteriaCurso);

            $codigoCurso=$curso[0]->cur_codigo;
            $codigoDocente=$temario[0]->doc_codigo;
            $codigoTema=$temario[0]->tem_codigo;
            
            $criteriaInforme = new CDbCriteria;
            $criteriaInforme->addCondition("t.doc_codigo =".$codigoDocente);
            $criteriaInforme->addCondition("t.cur_codigo =".$codigoCurso);
            $informe= InformeFinal::model()->findAll($criteriaInforme);

            
            if($informe == null){
                $model = new InformeFinal;
                
                //Recupero los valores por defecto
                $model->cur_codigo=$curso[0]->cur_codigo;
                $model->doc_codigo=$temario[0]->doc_codigo;
                $model->tem_codigo=$temario[0]->tem_codigo;
                $model->inf_nombre=$temario[0]->docCodigo->doc_nombre." ".$temario[0]->docCodigo->doc_apellido;
            }else{
                //Recupero el modelo de Informe Final
                $model = $this->loadModel($informe[0]->inf_codigo, 'InformeFinal');
            }
            
            
            if (isset($_POST['InformeFinal'])) {
                    $model->attributes = $_POST['InformeFinal'];
                    if ($model->save()) {
                    	if (Yii::app()->request->isAjaxRequest)
                    		Yii::app()->end();
                    	else
                            $this->render('createInforme', array( 'model' => $model));
                            //$this->redirect(array('view', 'id' => $model->inf_codigo));
                    }
            }
            $this->render('createInforme', array( 'model' => $model));
    }

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'InformeFinal');


		if (isset($_POST['InformeFinal'])) {
			$model->attributes = $_POST['InformeFinal'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->inf_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'InformeFinal')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('InformeFinal');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new InformeFinal('search');
		$model->unsetAttributes();

		if (isset($_GET['InformeFinal']))
			$model->attributes = $_GET['InformeFinal'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionAdminInforme() {
		$model = new InformeFinal('search');
		$model->unsetAttributes();

		if (isset($_GET['InformeFinal']))
			$model->attributes = $_GET['InformeFinal'];

		$this->render('adminInforme', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new InformeFinal('search');
		$model->unsetAttributes();

		if (isset($_GET['InformeFinal']))
			$model->attributes = $_GET['InformeFinal'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionInformeInstructorPdf() {
            
            $modelInforme = unserialize(base64_decode($_POST['model']));

            //CURSO
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.cur_codigo = '.$modelInforme->cur_codigo.';');
            $curso= Cursos::model()->findAll($criteria);
            
            //PLANIFICACION
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.pla_codigo = '.$curso[0]->pla_codigo.';');
            $plan= Planificacion::model()->findAll($criteria);

            $model = new Planificacion;
            $model = $this->loadModel($plan[0]->pla_codigo, 'Planificacion');
            
            $modelTemario= new Temario;
            
            //TEMARIO
            $criteriaTemario = new CDbCriteria;
            $criteriaTemario->addCondition('t.pla_codigo = '.$model->pla_codigo);
            $criteriaTemario->addCondition('t.doc_codigo = '.$modelInforme->doc_codigo);
            $modelTemario= Temario::model()->findAll($criteriaTemario);
                        
            
            //TIPO CAPACITACION
            $capacitacion= TipoCapacitacion::model()->findAll();
            
            //TIPO EVENTO
            $evento= TipoEvento::model()->findAll();

            //ACTIVIDADES
            $sql = "SELECT * FROM actividades a
                        left join contenido co on a.con_codigo=co.con_codigo
                        where a.con_codigo in (SELECT c.con_codigo FROM contenido c
                        where c.tem_codigo in (SELECT t.tem_codigo FROM temario t where t.doc_codigo=".$modelInforme->doc_codigo." and t.pla_codigo=".$model->pla_codigo."))
                    order by a.con_codigo";
            $actividades=Yii::app()->db->createCommand($sql)->queryAll();
            //Valores de Configuración del Reporte
            $nombre_reportes='INFORME A REVISIÓN';
            
            //Planificacion
            $nombrePlanificacion=$model->pla_nombre;
            $nombreCurso=$curso[0]->cur_nombre;
            $tipoCapacitacion=$model->tcaCodigo->tca_nombre;
            $tipoEvento=$model->tevCodigo->tev_nombre;
            $fechaInicio=$model->pla_fecha_inicio;
            $fechaFin=$model->pla_fecha_fin;
            $lugarCurso=$model->pla_lugar;
            $codigoCurso=$model->pla_curso_codigo;
            $docente=$modelInforme->docCodigo->doc_nombre." ".$modelInforme->docCodigo->doc_apellido;

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
            // Tabla Informe Datos
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> FECHA INFORME FINAL: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_fecha_entrega.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> ANTECEDENTES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$model->pla_antecedentes.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> DESARROLLO: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_desarrollo.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> LOGROS ALCANZADOS: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_logros.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> CONCLUSIONES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_conclusiones.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> RECOMENDACIONES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_recomendaciones.'</td>';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div><br /> ';
            // Tabla Detalle de Actividades
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td align="center" colspan="3"><b> DETALLE DE CLASES DICTADAS </b></td> ';
            $html.='	</tr><tr>';
            $html.='	<tr> ';
            $html.='	  	<td align="center" width="15%"><b> FECHA. </b></td> ';
            $html.='	  	<td align="center" width="70%"><b> ACTIVIDADES </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> TOTAL HORAS DOCENTE</b></td> ';
            $html.='	</tr>';
            $totalHorasDictadas=0;
            foreach ($actividades as $data) {
                $html.='<tr>';
                $html.='        <td align="center" width="15%"> '.$data['act_fecha'].'</td>';
                $html.='        <td align="left" width="70%"> '.$data['con_nombre'].' - '.$data['act_nombre'].'</td>';
                $html.='        <td align="center" width="15%"> '.$data['act_horas_totales_docente'].'</td>';
                $totalHorasDictadas=$totalHorasDictadas+$data['act_horas_totales_docente'];
                $html.='</tr>';
            }
            $html.='<tr> ';
            $html.='	  	<td colspan="2" align="center" width="85%"><b> TOTAL HORAS DICTADAS </b></td> ';
            $html.='	  	<td align="center" width="15%"> '.$totalHorasDictadas.' HORAS </td> ';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div> <br>';
                
                // Tabla Firmas de Responsabilidad
                $html.='<div align="left"> ';
                $html.='<table width="100%" border="0" align="center"> ';
                $html.='	<tr> ';
                $html.='	  	<td align="center" ><b> FIRMA:</b></td> ';
                $html.='	<br><br><br><br><br><br><br><br><br><br>';
                $html.='	</tr><tr> ';
                $html.='	  	<td align="center" width="40%">________________________________</td> ';
                $html.='	</tr><tr> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td align="center" width="40%">'.$docente.'</td> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td align="center" width="40%"><b> INSTRUCTOR </b></td> ';
                $html.='	</tr><tr> ';
                $html.='	</tr>';
                $html.='</table> ';
                $html.='</div><br> ';

            } 
            $mpdf=new mPDF('win-1252','A4',11,'',10,10,40,20,5,10); // Hoja A4; Font-size=11; left-rigth....
            $mpdf->SetHTMLHeader($header);
            $mpdf->WriteHTML($html);
            $mpdf->SetFooter(' sg-uec-espe-l | Página {PAGENO}/{nb}|{DATE j/m/Y}');
            $mpdf->Output('InformeRevision.pdf','D');
            exit;

            }
	}
        
        
        public function actionInformeFinalPdf($id) {
            
            $modelInforme = $this->loadModel($id, 'InformeFinal');

            //CURSO
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.cur_codigo = '.$modelInforme->cur_codigo.';');
            $curso= Cursos::model()->findAll($criteria);
            
            //PLANIFICACION
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.pla_codigo = '.$curso[0]->pla_codigo.';');
            $plan= Planificacion::model()->findAll($criteria);

            $model = new Planificacion;
            $model = $this->loadModel($plan[0]->pla_codigo, 'Planificacion');
            
            $modelTemario= new Temario;
            
            //TEMARIO
            $criteriaTemario = new CDbCriteria;
            $criteriaTemario->addCondition('t.pla_codigo = '.$model->pla_codigo);
            $criteriaTemario->addCondition('t.doc_codigo = '.$modelInforme->doc_codigo);
            $modelTemario= Temario::model()->findAll($criteriaTemario);
                        
            
            //TIPO CAPACITACION
            $capacitacion= TipoCapacitacion::model()->findAll();
            
            //TIPO EVENTO
            $evento= TipoEvento::model()->findAll();

            //ACTIVIDADES
            $sql = "SELECT * FROM actividades a
                        left join contenido co on a.con_codigo=co.con_codigo
                        where a.con_codigo in (SELECT c.con_codigo FROM contenido c
                        where c.tem_codigo in (SELECT t.tem_codigo FROM temario t where t.doc_codigo=".$modelInforme->doc_codigo." and t.pla_codigo=".$model->pla_codigo."))
                    order by a.con_codigo";
            $actividades=Yii::app()->db->createCommand($sql)->queryAll();
            //Valores de Configuración del Reporte
            $nombre_reportes='INFORME FINAL DEL CURSO';
            
            //Planificacion
            $nombrePlanificacion=$model->pla_nombre;
            $nombreCurso=$curso[0]->cur_nombre;
            $tipoCapacitacion=$model->tcaCodigo->tca_nombre;
            $tipoEvento=$model->tevCodigo->tev_nombre;
            $fechaInicio=$model->pla_fecha_inicio;
            $fechaFin=$model->pla_fecha_fin;
            $lugarCurso=$model->pla_lugar;
            $codigoCurso=$model->pla_curso_codigo;
            $docente=$modelInforme->docCodigo->doc_nombre." ".$modelInforme->docCodigo->doc_apellido;

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
            // Tabla Informe Datos
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> FECHA INFORME FINAL: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_fecha_entrega.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> ANTECEDENTES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$model->pla_antecedentes.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> DESARROLLO: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_desarrollo.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> LOGROS ALCANZADOS: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_logros.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> CONCLUSIONES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_conclusiones.'</td>';
            $html.='	</tr>';
            $html.='	<tr> ';
            $html.='		<td align="left" width="30%"><b> RECOMENDACIONES: </b></td>';
            $html.='		<td align="justify" width="70%">'.$modelInforme->inf_recomendaciones.'</td>';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div><br /> ';
            // Tabla Detalle de Actividades
            $html.='<div align="left"> ';
            $html.='<table width="100%" border="1" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td align="center" colspan="7"><b> DETALLE DE CLASES DICTADAS </b></td> ';
            $html.='	</tr><tr>';
            $html.='	<tr> ';
            $html.='	  	<td align="center" width="15%"><b> FECHA </b></td> ';
            $html.='	  	<td align="center" width="70%"><b> TEMA </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> HORAS DICTADAS </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> HORAS ACT. DOCENTE </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> TOTAL HORAS DOCENTE </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> VALOR H/CLASE </b></td> ';
            $html.='	  	<td align="center" width="15%"><b> VALOR A PAGAR </b></td> ';
            $html.='	</tr>';
            $totalHorasDictadas=0;
            $totalHorasActDocente=0;
            $totalHorasTotales=0;
            $totalValor=0;
            foreach ($actividades as $data) {
                $html.='<tr>';
                $html.='        <td align="center" width="15%"> '.$data['act_fecha'].'</td>';
                $html.='        <td align="left" width="70%"> '.$data['con_nombre'].' - '.$data['act_nombre'].'</td>';
                $html.='        <td align="center" width="15%"> '.$data['act_horas_dictadas'].'</td>';
                $html.='        <td align="center" width="15%"> '.$data['act_horas_act_docente'].'</td>';
                $html.='        <td align="center" width="15%"> '.$data['act_horas_totales_docente'].'</td>';
                $html.='        <td align="center" width="15%"> '.$data['act_valor_pagar'].'</td>';
                $html.='        <td align="center" width="15%"> '.$data['act_valor_total'].'</td>';
                $totalHorasDictadas=$totalHorasDictadas+$data['act_horas_dictadas'];
                $totalHorasActDocente=$totalHorasActDocente+$data['act_horas_act_docente'];
                $totalHorasTotales=$totalHorasTotales+$data['act_horas_totales_docente'];
                $totalValor=$totalValor+$data['act_valor_total'];
                $html.='</tr>';
            }
            $html.='<tr> ';
            $html.='	  	<td colspan="2" align="center" width="85%"><b> TOTAL: </b></td> ';
            $html.='	  	<td align="center" width="15%"> '.$totalHorasDictadas.'  </td> ';
            $html.='	  	<td align="center" width="15%"> '.$totalHorasActDocente.'  </td> ';
            $html.='	  	<td align="center" width="15%"> '.$totalHorasTotales.'  </td> ';
            $html.='	  	<td></td> ';
            $html.='	  	<td align="center" width="15%"> '.$totalValor.'  </td> ';
            $html.='	</tr>';
            $html.='	</table> ';
            $html.='</div> <br><br><br><br><br>';
            //Valores a cancelar
            //$html.='<div align="left"> ';
            $html.='<table width="100%" border="0" align="center"> ';
            $html.='	<tr> ';
            $html.='	  	<td align="left" width="100%"> 
                        Una vez verificado el Detalle de Clases Dictadas por el (la) señor (a) 
                        '.$docente.',  
                        instructor del curso de 
                        '.$nombreCurso.', 
                        se solicita la cancelación de $USD '.$totalValor.',
                        por concepto de pago de horas de clase programadas.  </td> ';
            $html.='	</tr>';
            $html.='	</table> ';
                
                // Tabla Firmas de Responsabilidad
                $html.='<div align="left"> ';
                $html.='<table width="100%" border="0" align="center"> ';
                $html.='	<tr> ';
                $html.='	  	<td align="center" ><b> FIRMAS DE RESPONSABILIDAD:</b></td> ';
                $html.='                <td></td> ';
                $html.='                <td></td> ';
                $html.='	';
                $html.='	</tr><br><br><br><tr> ';
                $html.='	</tr><br><br><br><br><tr> ';
                $html.='	</tr><br><br><br><br><tr> ';
                $html.='	</tr><tr> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td align="center" width="40%">________________________________</td> ';
                $html.='                <td></td> ';
                $html.='	  	<td align="center" width="40%">________________________________</td> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td align="center" width="40%">'.$docente.'</td> ';
                $html.='	  	<td></td> ';
                $html.='	  	<td align="center" width="40%">'.$model->pla_firma_supervisado.'</td> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td align="center" width="40%"><b> INSTRUCTOR</b> </td> ';
                $html.='	  	<td></td> ';
                $html.='	  	<td align="center" width="40%"><b> '.$model->pla_pie_supervisado.' </b></td> ';
                $html.='	</tr>';
                $html.='	<tr> ';
                $html.='	  	<td></td> ';
                $html.='	  	<td></td> ';
                $html.='	  	<td></td> ';
                $html.='	<br><br><br><br><br><br><br>';
                $html.='	</tr><tr> ';
                $html.='                <td></td> ';
                $html.='	  	<td align="center" width="40%">________________________________</td> ';
                $html.='                <td></td> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td></td> ';
                $html.='	  	<td align="center" width="40%">'.$firma_jefe.'</td> ';
                $html.='	  	<td></td> ';
                $html.='	</tr><tr> ';
                $html.='	  	<td></td> ';
                $html.='	  	<td align="center" width="40%"><b>'.$pie_jefe.'</b></td> ';
                $html.='	  	<td></td> ';
                $html.='	</tr><tr> ';
                $html.='	</tr>';
                $html.='</table> ';
                $html.='</div><br> ';

            } 
            $mpdf=new mPDF('win-1252','A4',11,'',10,10,40,20,5,10); // Hoja A4; Font-size=11; left-rigth....
            $mpdf->SetHTMLHeader($header);
            $mpdf->WriteHTML($html);
            $mpdf->SetFooter(' sg-uec-espe-l | Página {PAGENO}/{nb}|{DATE j/m/Y}');
            $mpdf->Output('InformeRevision.pdf','D');
            exit;

            }
	}

}