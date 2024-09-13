<?php

class AnexosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Anexos'),
		));
	}

	public function actionCreate() {
		$model = new Anexos;


		if (isset($_POST['Anexos'])) {
			$model->attributes = $_POST['Anexos'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->ane_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

        public function actionCreateAnexo() {
		$model = new Anexos;
		if (isset($_POST['Anexos'])) {
                    $model->attributes = $_POST['Anexos'];
                    
                    if ($model->save()) {
                            if (Yii::app()->request->isAjaxRequest)
                                    Yii::app()->end();
                            else
                                    $this->redirect(array('updateAnexos', 'id' => $model->pla_codigo));
                    }
		}
	}

        
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Anexos');


		if (isset($_POST['Anexos'])) {
			$model->attributes = $_POST['Anexos'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->ane_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
        //Update Objetivos Especificos
        public function actionUpdateAnexos($id) {
            
                $model= new Anexos;
                //Seleccionar el/los grupo
                $criteria = new CDbCriteria;
                $criteria->addCondition("t.pla_codigo = $id;");
                $anexos= Anexos::model()->findAll($criteria);
                $clave=$id;    
                $reporte=null;
                $ord=0;
                foreach ($anexos as $data) {
                    $reporte[$ord]['codigoPlan']=$data->pla_codigo;
                    $reporte[$ord]['planificacion']=$data->plaCodigo->pla_nombre;
                    $reporte[$ord]['anexo']=$data->ane_nombre;
                    $reporte[$ord]['codigoAnexo']=$data->ane_codigo;
                    $ord++;
                }
                $this->render('updateAnexos', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave));

	}
        
        public function actionDelete($id) {
            
            //Seleccionar AnexosPlanificacion
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.ane_codigo =$id;");
            $anexos= Anexos::model()->findAll($criteria); 
            
            $model=$this->loadModel($id, 'Anexos');

            
            try {
                if ($model->delete())
                            $this->redirect(array('updateAnexos', 'id' => $anexos[0]->pla_codigo));
            } catch (Exception $exc) {
                    Yii::app()->user->setFlash('ERROR',"No se puede eliminar. Por favor no lo intente nuevamente.");
                    $this->redirect(array('updateGrupos', 'id' => $anexos[0]->pla_codigo));
            }
	}
        
        
/*
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Anexos')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
 
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Anexos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Anexos('search');
		$model->unsetAttributes();

		if (isset($_GET['Anexos']))
			$model->attributes = $_GET['Anexos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Anexos('search');
		$model->unsetAttributes();

		if (isset($_GET['Anexos']))
			$model->attributes = $_GET['Anexos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}