<?php

class ObjetivosEspecificosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ObjetivosEspecificos'),
		));
	}

	public function actionCreate() {
		$model = new ObjetivosEspecificos;


		if (isset($_POST['ObjetivosEspecificos'])) {
			$model->attributes = $_POST['ObjetivosEspecificos'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->obj_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        
        public function actionCreateObjetivo() {
		$model = new ObjetivosEspecificos;
		if (isset($_POST['ObjetivosEspecificos'])) {
                    $model->attributes = $_POST['ObjetivosEspecificos'];
                    
                    if ($model->save()) {
                            if (Yii::app()->request->isAjaxRequest)
                                    Yii::app()->end();
                            else
                                    $this->redirect(array('updateObjetivos', 'id' => $model->pla_codigo));
                    }
		}
	}
        

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ObjetivosEspecificos');


		if (isset($_POST['ObjetivosEspecificos'])) {
			$model->attributes = $_POST['ObjetivosEspecificos'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->obj_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
        //Update Objetivos Especificos
        public function actionUpdateObjetivos($id) {
		$model = $this->loadModel($id, 'Planificacion');
                
                
                $model= new ObjetivosEspecificos;
                //Seleccionar el/los grupo
                $criteria = new CDbCriteria;
                $criteria->addCondition("t.pla_codigo = $id;");
                $objetivos= ObjetivosEspecificos::model()->findAll($criteria);
                $clave=$id;    
                $reporte=null;
                $ord=0;
                foreach ($objetivos as $data) {
                    $reporte[$ord]['codigoPlan']=$data->pla_codigo;
                    $reporte[$ord]['planificacion']=$data->plaCodigo->pla_nombre;
                    $reporte[$ord]['objetivo']=$data->obj_especifico;
                    $reporte[$ord]['codigoObjetivo']=$data->obj_codigo;
                    $ord++;
                }
                $this->render('updateObjetivos', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave));

	}

        public function actionDelete($id) {
            
            //Seleccionar ObjetivosPlanificacion
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.obj_codigo =$id;");
            $objetivos= ObjetivosEspecificos::model()->findAll($criteria); 
            
            $model=$this->loadModel($id, 'ObjetivosEspecificos');

            
            try {
                if ($model->delete())
                            $this->redirect(array('updateObjetivos', 'id' => $objetivos[0]->pla_codigo));
            } catch (Exception $exc) {
                    Yii::app()->user->setFlash('ERROR',"No se puede eliminar. Por favor no lo intente nuevamente.");
                    $this->redirect(array('updateGrupos', 'id' => $objetivos[0]->pla_codigo));
            }
	}
        
/*        
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'ObjetivosEspecificos')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}

	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('ObjetivosEspecificos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new ObjetivosEspecificos('search');
		$model->unsetAttributes();

		if (isset($_GET['ObjetivosEspecificos']))
			$model->attributes = $_GET['ObjetivosEspecificos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new ObjetivosEspecificos('search');
		$model->unsetAttributes();

		if (isset($_GET['ObjetivosEspecificos']))
			$model->attributes = $_GET['ObjetivosEspecificos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}