<?php

class AsistenciaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Asistencia'),
		));
	}

	public function actionCreate() {
		$model = new Asistencia;


		if (isset($_POST['Asistencia'])) {
			$model->attributes = $_POST['Asistencia'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->asi_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Asistencia');


		if (isset($_POST['Asistencia'])) {
			$model->attributes = $_POST['Asistencia'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->asi_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Asistencia')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Asistencia');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Asistencia('search');
		$model->unsetAttributes();

		if (isset($_GET['Asistencia']))
			$model->attributes = $_GET['Asistencia'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Asistencia('search');
		$model->unsetAttributes();

		if (isset($_GET['Asistencia']))
			$model->attributes = $_GET['Asistencia'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

        
        /////////////////////////////////////////////////////////////////////////////// 
	// LISTA DE MATRICULADOS CON CARTILLAS DE NOTAS -A ASISTENCIA - LISTA SIMPLE
	///////////////////////////////////////////////////////////////////////////////
	public function actionReporteAsistencia() {
		//Modelo para la toma de parametros
		$model=new Parametros; 
		$reporte=null;
                
                //Si se envia el formulario, recupera los datos
		if(isset($_POST['Parametros'])){   
                    $model->attributes=$_POST['Parametros']; 
                    $criteria=new CDbCriteria; //Criterios para la seleccion de los datos
                    $criteria->with = array('parCodigo');  //Nombre de la relacion del Modelo
                    $criteria->compare('cur_codigo',$model->cur_codigo,true);
                    $criteria->compare('gru_codigo',$model->gru_codigo,true);
                    $criteria->compare('ein_codigo',2,true);
                    $criteria->order='parCodigo.par_apellido_participante,parCodigo.par_nombre_participante';
                    $reporte = Inscripcion::model()->findAll($criteria);

                }else{	
                    $model->par_opcion='listaSimple'; //Lista Simple
		} 
                
                //print_r($reporte);
		$this->render('reporteAsistencia', array('reporte' => $reporte,'model' => $model));
	}


        public function actionReporteAsistenciaPdf()
        {
            
            $reporte = unserialize(base64_decode($_POST['reporte']));
            $model = unserialize(base64_decode($_POST['model']));
            $par_opcion = $model->par_opcion;
            
                 //PLANIFICACION
                $criteriaPlan = new CDbCriteria;
                $criteriaPlan->addCondition('t.pla_codigo = '.$reporte[0]->cur_codigo.';');
                $planificacion= Planificacion::model()->findAll($criteriaPlan);

                //TIPO CAPACITACION
                $capacitacion= TipoCapacitacion::model()->findAll();

                //TIPO EVENTO
                $evento= TipoEvento::model()->findAll();

                //Nombre Planificacion
                $nombrePlanificacion=$planificacion[0]->pla_nombre;
                $nombreCurso=$reporte[0]->curCodigo->cur_nombre;
                $tipoCapacitacion=$planificacion[0]->tcaCodigo->tca_nombre;
                $tipoEvento=$planificacion[0]->tevCodigo->tev_nombre;
                $fechaInicio=$planificacion[0]->pla_fecha_inicio;
                $fechaFin=$planificacion[0]->pla_fecha_inicio;
                $lugarCurso=$planificacion[0]->pla_lugar;
                $codigoCurso=$planificacion[0]->pla_curso_codigo;

                //Valores de Configuración del Reporte
                if($par_opcion=='listaSimple') { 
                        $reporteOpcion='ASISTENCIA DIARIA';
                }elseif(
                        $par_opcion=='cartillaAsistencia'){ $reporteOpcion='EVALUACIÓN DE ASISTENCIA';
                }elseif(
                        $par_opcion=='cartillaNotas'){ $reporteOpcion='CARTILLA DE NOTAS';         
                }


                $nombre_reportes=$reporteOpcion;

                //Valores para encabezado
                $pdf = Yii::createComponent('application.extensions.MPDF54.mpdf');
                // <!-- TABLA DE DATOS DESPLEGADOS -->
                $ord=1;
                if($reporte!=null){ 
                    //Valores para Firmas de Pagina
                    $empresa = Empresa::model()->findAll();
                    $firma_instructor=$empresa[0]->emp_firma_docente;
                    $pie_firma_instructor=$empresa[0]->emp_pie_docente;

                //Encabezado; nombre del reporte
                    $header.='<div align="center"> ';
                    $header.='<img src="http://webltga.espe.edu.ec/sg-uec/images/encabezadoUnidadEC.png">';
                    $header.='<br><br><br>';
                    $header.='</div> ';
                //ENCABEZADO GENERAL
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
                    $html.='	</table> ';
                    $html.='</div> ';
                    $html.='<br>';

                //Encabezado de Filas de Registros
                    $html.='<table width="100%" border="1" align="center"> ';
                    if($par_opcion=='listaSimple') {    
                        $html.='	<tr> ';
                        $html.='		<th align="left" colspan="4" height="30"><b>FECHA:</b></th> ';
                        $html.='	</tr>';
                    }
                    $html.='	<tr> ';
                    $html.='		<th align="center" width="4%" height="30"><b>ORD.</b></th> ';
                    $html.='	  	<th align="left" width="40%" height="30"><b>APELLIDOS Y NOMBRES</b></th> ';
                    $html.='		<th align="center" width="11%" height="30"><b>Nº CEDULA</b></th> ';
                    if($par_opcion=='listaSimple') {    
                        $html.='		<th>FIRMA</th>';
                    }elseif($par_opcion=='cartillaAsistencia'){
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th>&nbsp;</th>';
                        $html.='		<th width="50">% DE ASISTENCIA</th>';
                        $html.='		<th width="50">APROBADO/ REPROBADO</th>';
                    }elseif($par_opcion=='cartillaNotas'){ 
                        $html.='		<th width="6%">NOTA 1</th>';
                        $html.='		<th width="6%">NOTA 2</th>';
                        $html.='		<th width="7%">PROM</th>';
                        $html.='		<th width="7%">NOTA FINAL</th>';
                    }
                    $html.='	</tr> ';
                    //$html.='</table> ';
                    //Contenido del Reporte
                    //$html.='<table width="100%" border="1" align="center"> ';
                    foreach($reporte as $data) { 
                        $html.='	<tr> ';
                        $html.='		<td align="center" width="4%"> '. $ord++. '</td> ';
                        $html.='		<td align="left" width="40%"> '. $data->parCodigo->par_apellido_participante.' '.$data->parCodigo->par_nombre_participante. '</td> ';
                        $html.='		<td align="center" width="11%"> '. $data->parCodigo->par_cedula_participante. '</td> ';
                        if($par_opcion=='listaSimple') {
                            $html.='		<td align="center" height="25">&nbsp;</td>';
                        }elseif($par_opcion=='cartillaAsistencia'){ 
                            $html.='		<td height="25"></td>';
                            $html.='		<td></td>';
                            $html.='		<td></td>';
                            $html.='		<td></td>';
                            $html.='		<td></td>';
                            $html.='		<td></td>';
                            $html.='		<td></td>';
                            $html.='		<td></td>';
                            $html.='		<td width="50">&nbsp;</td>';
                            $html.='		<td width="50">&nbsp;</td>';
                        }elseif($par_opcion=='cartillaNotas'){
                            $html.='		<td height="25" width="6%"> </td>';
                            $html.='		<td width="6%"> </td>';
                            $html.='		<td width="6%"> </td>';
                            $html.='		<td width="7%"> </td>';
                        }
                        $html.='  </tr> ';
                    } 
                    $html.=' </table> ';
                    // Pies de firmas del Reporte
                    $html.=' <br><br><br><br><br><br><br>';
                    $html.='<table width="100%" border="0" align="center"> ';
                    $html.='	<tr> ';
                    $html.='		<td align="center" width="25%"></td> ';
                    $html.='		<td align="center" width="50%">'.$firma_instructor.'</td> ';
                    $html.='		<td align="center" width="25%"></td> ';
                    $html.='	</tr> ';
                    $html.='	<tr> ';
                    $html.='		<td align="center" width="25%"></td> ';
                    $html.='		<td align="center" width="50%"><b>'.$pie_firma_instructor.'<b></td> ';
                    $html.='		<td align="center" width="25%"></td> ';
                    $html.='	</tr> ';
                    $html.='</table> ';
            } 
            $mpdf=new mPDF('win-1252','A4',11,'',10,10,47,20,5,10); // Hoja A4; Font-size=11; left-rigth....
            $mpdf->SetHTMLHeader($header);
            $mpdf->WriteHTML($html);
            $mpdf->SetFooter(' sg-uec-espe-l | Página {PAGENO}/{nb}|{DATE j/m/Y H:m:s}');
            $mpdf->Output('listadoParticipantes.pdf','D');
            exit;   
    }
        
        
}