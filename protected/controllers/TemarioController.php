<?php

class TemarioController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Temario'),
		));
	}

	public function actionCreate() {
		$model = new Temario;


		if (isset($_POST['Temario'])) {
			$model->attributes = $_POST['Temario'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->tem_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
        
        public function actionCreateTemario() {
		$model = new Temario;
		if (isset($_POST['Temario'])) {
                    $model->attributes = $_POST['Temario'];
                    if ($model->save()) {
                            if (Yii::app()->request->isAjaxRequest)
                                    Yii::app()->end();
                            else
                                    $this->redirect(array('updateTemario', 'id' => $model->pla_codigo));
                    }
		}
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Temario');


		if (isset($_POST['Temario'])) {
			$model->attributes = $_POST['Temario'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->tem_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
        //Update Temario
        public function actionUpdateTemario($id) {
		
                $model= new Temario;
                //Seleccionar el Temario
                $criteria = new CDbCriteria;
                $criteria->addCondition("t.pla_codigo = $id;");
                $temario= Temario::model()->findAll($criteria);
                $clave=$id;    
                $reporte=null;
                $ord=0;
                foreach ($temario as $data) {
                    $reporte[$ord]['codigoPlan']=$data->pla_codigo;
                    $reporte[$ord]['planificacion']=$data->plaCodigo->pla_nombre;
                    $reporte[$ord]['instructor']=$data->docCodigo->doc_apellido." ".$data->docCodigo->doc_nombre;
                    $reporte[$ord]['tema']=$data->tem_nombre;
                    $reporte[$ord]['fechaInicio']=$data->tem_fecha_inicio;
                    $reporte[$ord]['fechaFin']=$data->tem_fecha_fin;
                    $reporte[$ord]['codigoTemario']=$data->tem_codigo;
                    $ord++;
                }
                $this->render('updateTemario', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave));

	}

        public function actionDelete($id) {
            
            //Seleccionar ObjetivosPlanificacion
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.tem_codigo =$id;");
            $temario= Temario::model()->findAll($criteria); 
            
            $model=$this->loadModel($id, 'Temario');

            try {
                if ($model->delete())
                            $this->redirect(array('updateTemario', 'id' => $temario[0]->pla_codigo));
            } catch (Exception $exc) {
                    Yii::app()->user->setFlash('ERROR',"No se puede eliminar. Por favor no lo intente nuevamente.");
                    $this->redirect(array('updateTemario', 'id' => $temario[0]->pla_codigo));
            }
	}

/*
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Temario')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}

	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Temario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Temario('search');
		$model->unsetAttributes();

		if (isset($_GET['Temario']))
			$model->attributes = $_GET['Temario'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

        
        public function actionAdminTemario() {
		
            if (Yii::app()->user->checkAccess('Instructor')) {
                
                $model = new Temario('searchTemario');
		$model->unsetAttributes();

		if (isset($_GET['Temario']))
			$model->attributes = $_GET['Temario'];
            
		$this->render('adminTemario', array(
			'model' => $model,
		));
            }else{
                $this->redirect(Yii::app()->homeUrl);
            }    
                
	}
        
	public function actionIndex() {
		$model = new Temario('search');
		$model->unsetAttributes();

		if (isset($_GET['Temario']))
			$model->attributes = $_GET['Temario'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}