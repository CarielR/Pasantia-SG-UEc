<?php

class CertificadosController extends GxController
{
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Anexos'),
		));
	}

	public function actionCreate() {
		$model = new Certificados;
		if (isset($_POST['Certificados'])) {
			$model->attributes = $_POST['Certificados'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->cer_codigo));
			}
		}
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Certificados');


		if (isset($_POST['Certificados'])) {
			$model->attributes = $_POST['Certificados'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cer_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Certificados')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
 
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Certificados');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionIndex() {
		$model = new Anexos('search');
		$model->unsetAttributes();

		if (isset($_GET['Certificados']))
			$model->attributes = $_GET['Certificados'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

        
        public $uploadedFile;
        public function actionCargarCertificados()
	{   
            $model = new Certificados();
            
            $criteriaParticipante=new CDbCriteria;
            $criteriaParticipante->order="par_apellido_participante";
            $participantes=  Participante::model()->findAll($criteriaParticipante);
            
            $criteriaCursos=new CDbCriteria;
            $criteriaCursos->order="cur_nombre";
            $cursos=  Cursos::model()->findAll($criteriaCursos);
            
            
            if (isset($_POST['Certificados'])) {                       
                $model->attributes = $_POST['Certificados'];
                
                $model->cer_carga_usuario=Yii::app()->user->name;
                
                $uploadedFile=CUploadedFile::getInstance($model,'cer_nombre');
                $uploadedFileConstancia=CUploadedFile::getInstance($model,'cer_constancia');
                if(!empty($uploadedFile))
                {   
                    $fileName = "{$model->par_codigo}{$model->cur_codigo}.pdf";  
                    $model->cer_nombre = $fileName;
                }
                
                if(!empty($uploadedFileConstancia))
                {   
                    $fileName = "{$model->par_codigo}{$model->cur_codigo}.pdf";  
                    $model->cer_constancia = $fileName;
                }
                
                if ($model->save())  {
                    if(!empty($uploadedFile))
                        {       $path="certificados/$model->cer_nombre";
                                $uploadedFile->saveAs($path);
                        }
                    if(!empty($uploadedFileConstancia))
                        {       $path="constancias/$model->cer_constancia";
                                $uploadedFileConstancia->saveAs($path);
                        }
                }
            }
            $this->render('cargarCertificados', array('model' => $model, 'cursos' => $cursos, 'participantes' => $participantes));
        }
        
        public function actionVerCertificados() {

		//Modelo para la toma de parametros
		$model=new Parametros;
                
                $reporte=null;
                $criteriaCursos=new CDbCriteria;
                $criteriaCursos->order="cur_nombre";
                $cursos=  Cursos::model()->findAll($criteriaCursos);
                
                
                if(isset($_POST['Parametros']))
                {   
                    $model->attributes=$_POST['Parametros']; 
                    $cedula=$model->par_busqueda;
                    $codigoCurso=$model->cur_codigo;
                    
                    if ($cedula==""){
                        $sql="SELECT * FROM certificados  c, participante p, cursos cu where cu.cur_codigo=c.cur_codigo and p.par_codigo=c.par_codigo and c.cur_codigo=".$codigoCurso.";";
                        $reporte=Yii::app()->db->createCommand($sql)->queryAll();
                    }else{
                        $sql="SELECT * FROM certificados c, participante p, cursos cu 
                                where cu.cur_codigo=c.cur_codigo 
                                and c.par_codigo=p.par_codigo
                                and p.par_cedula_participante=".$cedula.";";
                        $reporte=Yii::app()->db->createCommand($sql)->queryAll();
                    }
                }
		$this->render('verCertificados', array('reporte' => $reporte,'model' => $model, 'cursos' => $cursos));
            }
        
            
            public function actionVerCertificadosAdmin() {

		//Modelo para la toma de parametros
		$model=new Parametros;
                
                $reporte=null;
                $criteriaCursos=new CDbCriteria;
                $criteriaCursos->order="cur_nombre";
                $cursos=  Cursos::model()->findAll($criteriaCursos);
                
                
                if(isset($_POST['Parametros']))
                {   
                    $model->attributes=$_POST['Parametros']; 
                    $cedula=$model->par_busqueda;
                    $codigoCurso=$model->cur_codigo;
                    
                    if ($cedula==""){
                        $sql="SELECT * FROM certificados  c, participante p, cursos cu where cu.cur_codigo=c.cur_codigo and p.par_codigo=c.par_codigo and c.cur_codigo=".$codigoCurso.";";
                        $reporte=Yii::app()->db->createCommand($sql)->queryAll();
                    }else{
                        $sql="SELECT * FROM certificados c, participante p, cursos cu 
                                where cu.cur_codigo=c.cur_codigo 
                                and c.par_codigo=p.par_codigo
                                and p.par_cedula_participante=".$cedula.";";
                        $reporte=Yii::app()->db->createCommand($sql)->queryAll();
                    }
                }
		$this->render('verCertificadosAdmin', array('reporte' => $reporte,'model' => $model, 'cursos' => $cursos));
            }
            
        
        
        //Desacargar certificados UEC
        public function actionDescargar($nombre) {
            $sqlAnexo="SELECT * FROM certificados where cer_nombre=".$nombre.";";
            $anexo=Yii::app()->db->createCommand($sqlAnexo)->queryAll();
           
            $nombre=$anexo[0]['filename'];
            
            header("Content-type:application/pdf");
            header("Content-Disposition: attachment; filename=".$nombre."");
            echo $contenido;

        }
        
}
