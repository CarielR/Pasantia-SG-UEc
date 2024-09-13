<?php

class GruposController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Grupos'),
		));
	}

	public function actionCreate() {
		$model = new Grupos;
		if (isset($_POST['Grupos'])) {
			$model->attributes = $_POST['Grupos'];
			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->gru_codigo));
			}
		}
	}

        
        public function actionCreateGrupos() {
		$model = new Grupos;
		if (isset($_POST['Grupos'])) {
			$model->attributes = $_POST['Grupos'];
                    $modelPlanificacion= new Planificacion;
                    //Seleccionar Planificacion
                    $criteria = new CDbCriteria;
                    $criteria->addCondition('t.pla_codigo = '.$model->curCodigo->pla_codigo.';');
                    $planificacion= Planificacion::model()->findAll($criteria); 
                        if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
                			$this->redirect(array('updateGrupos', 'id' => $planificacion[0]->pla_codigo));
			}
		}
                //$this->render('create', array( 'model' => $model));
	}
        
        
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Grupos');


		if (isset($_POST['Grupos'])) {
			$model->attributes = $_POST['Grupos'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->gru_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

        
        //administracion de los Grupos de la Planificacion
        public function actionUpdateGrupos($id) {
		$model = $this->loadModel($id, 'Planificacion');
			
                //Seleccionar curso
                $criteria = new CDbCriteria;
                $criteria->addCondition('t.pla_codigo = '.$model->pla_codigo.';');
                $cursos= Cursos::model()->findAll($criteria);

                
                
                $model= new Grupos;
                //Seleccionar el/los grupo
                $criteria = new CDbCriteria;
                $criteria->addCondition('t.cur_codigo = '.$cursos[0]->cur_codigo.';');
                $grupos= Grupos::model()->findAll($criteria);
                $clave=$cursos[0]->cur_codigo;
                    if (isset($_POST['Grupos'])) {
                        //guardar Curso Padre
			$model->attributes = $_POST['Grupos'];
                    }
                    
                $reporte=null;
                $ord=0;
                foreach ($grupos as $data) {
                    $reporte[$ord]['codigoCurso']=$data->cur_codigo;
                    $reporte[$ord]['curso']=$data->curCodigo->cur_nombre;
                    $reporte[$ord]['nombre']=$data->gru_nombre;
                    $reporte[$ord]['horario']=$data->gru_horario;
                    $reporte[$ord]['codigoGrupo']=$data->gru_codigo;
                    $ord++;
                }
                $this->render('updateGrupos', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave));

	}
        
        
	public function actionDelete($id) {

            
            //Seleccionar GrupoCurso
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.gru_codigo = '.$id.';');
            $grupos= Grupos::model()->findAll($criteria); 

            //Seleccionar CursoPlanificacion
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.cur_codigo = '.$grupos[0]->cur_codigo.';');
            $cursos= Cursos::model()->findAll($criteria); 
            
            $model=$this->loadModel($id, 'Grupos');

            
            try {
                if ($model->delete())
                            $this->redirect(array('updateGrupos', 'id' => $cursos[0]->pla_codigo));
            } catch (Exception $exc) {
                    Yii::app()->user->setFlash('ERROR',"Se encuentran estudiantes registrados en este grupo. Por favor no lo intente nuevamente.");
                    $this->redirect(array('updateGrupos', 'id' => $cursos[0]->pla_codigo));
            }
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Grupos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Grupos('search');
		$model->unsetAttributes();

		if (isset($_GET['Grupos']))
			$model->attributes = $_GET['Grupos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Grupos('search');
		$model->unsetAttributes();

		if (isset($_GET['Grupos']))
			$model->attributes = $_GET['Grupos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionCargarGrupos() {
            $data=  Grupos::model()->findAllBySql("Select * from grupos where cur_codigo=:keyword order by cur_codigo asc",
                         array(':keyword'=>$_POST['miCurso']));
            $data=CHtml::listData($data,'gru_codigo','gru_nombre');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
            }
        }
        
        public function actionCargarGruposReporte() {
            $data=  Grupos::model()->findAllBySql("Select * from grupos where cur_codigo=:keyword order by cur_codigo asc",
                         array(':keyword'=>$_POST['miCurso']));
            $data=CHtml::listData($data,'gru_codigo','gru_nombre');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
            }
        }
        

}