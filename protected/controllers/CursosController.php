<?php

class CursosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Cursos'),
		));
	}

	public function actionCreate() {
		$model = new Cursos;


		if (isset($_POST['Cursos'])) {
			$model->attributes = $_POST['Cursos'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->cur_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Cursos');


		if (isset($_POST['Cursos'])) {
			$model->attributes = $_POST['Cursos'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cur_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
        
        //Update Objetivos Especificos
        public function actionUpdateCurso($id) {
		
            $model= new Cursos;
            $clave=$id;    
            $reporte=null;
            //Seleccionar el curso
            $criteria = new CDbCriteria;
            $criteria->addCondition("t.pla_codigo = $id;");
            $cursos= Cursos::model()->findAll($criteria);
            
            $model = $this->loadModel($cursos[0]->cur_codigo, 'Cursos');
            
            if (isset($_POST['Cursos'])) {
			$model->attributes = $_POST['Cursos'];
                        if ($model->save()) {
                                Yii::app()->user->setFlash('Exitoso',"Se encuentra actualizada la información del curso.");
                                $this->render('updateCurso', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave));
			}
		}
            $this->render('updateCurso', array('model' => $model, 'reporte' => $reporte, 'clave' => $clave));

	}
        

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Cursos')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Cursos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Cursos('search');
		$model->unsetAttributes();

		if (isset($_GET['Cursos']))
			$model->attributes = $_GET['Cursos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Cursos('search');
		$model->unsetAttributes();

		if (isset($_GET['Cursos']))
			$model->attributes = $_GET['Cursos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}