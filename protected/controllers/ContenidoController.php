<?php

class ContenidoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Contenido'),
		));
	}

	public function actionCreate() {
		$model = new Contenido;


		if (isset($_POST['Contenido'])) {
			$model->attributes = $_POST['Contenido'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->con_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

        //Creación SUbtemas
        public function actionCreateContenido() {
		$model = new Contenido;
		if (isset($_POST['Contenido'])) {
                    $model->attributes = $_POST['Contenido'];
                    if ($model->save()) {
                            if (Yii::app()->request->isAjaxRequest)
                                    Yii::app()->end();
                            else
                                    $this->redirect(array('updateContenido', 'id' => $model->tem_codigo));
                    }
		}
	}

        
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Contenido');


		if (isset($_POST['Contenido'])) {
			$model->attributes = $_POST['Contenido'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->con_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

        
        //Update Contenidos - Temas
        public function actionUpdateContenido($id) {
            
            //Seleccionar el Temario
            $model=$this->loadModel($id, 'Temario');
            $clavePlan=$model->pla_codigo;
            
            $model= new Contenido;
            //Seleccionar el Contenido
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.tem_codigo = $id;");
            $contenido= Contenido::model()->findAll($criteria);
            $clave=$id;
            $reporte=null;
            $ord=0;
            foreach ($contenido as $data) {
                $reporte[$ord]['codigoTema']=$data->tem_codigo;
                $reporte[$ord]['tema']=$data->temCodigo->tem_nombre;
                $reporte[$ord]['contenido']=$data->con_nombre;
                $reporte[$ord]['horaClase']=$data->con_horas_planificadas;
                $reporte[$ord]['horaActividad']=$data->con_horas_act_planificadas;
                $reporte[$ord]['codigoContenido']=$data->con_codigo;
                $ord++;
            }
            $this->render('updateContenido', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave, 'clavePlan' => $clavePlan));

	}

        public function actionDelete($id) {
            
            //Seleccionar Contenido-Tema
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.con_codigo =$id;");
            $contenido= Contenido::model()->findAll($criteria); 
            
            $model=$this->loadModel($id, 'Contenido');

            try {
                if ($model->delete())
                            $this->redirect(array('updateContenido', 'id' => $contenido[0]->tem_codigo));
            } catch (Exception $exc) {
                    Yii::app()->user->setFlash('ERROR',"No se puede eliminar. Por favor no lo intente nuevamente.");
                    $this->redirect(array('updateContenido', 'id' => $contenido[0]->tem_codigo));
            }
	}
        
        
        /*        
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Contenido')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Contenido');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Contenido('search');
		$model->unsetAttributes();

		if (isset($_GET['Contenido']))
			$model->attributes = $_GET['Contenido'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Contenido('search');
		$model->unsetAttributes();

		if (isset($_GET['Contenido']))
			$model->attributes = $_GET['Contenido'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
        

}