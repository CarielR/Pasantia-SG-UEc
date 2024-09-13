<?php

class EstadoInscripcionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'EstadoInscripcion'),
		));
	}

	public function actionCreate() {
		$model = new EstadoInscripcion;


		if (isset($_POST['EstadoInscripcion'])) {
			$model->attributes = $_POST['EstadoInscripcion'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->ein_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'EstadoInscripcion');


		if (isset($_POST['EstadoInscripcion'])) {
			$model->attributes = $_POST['EstadoInscripcion'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->ein_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'EstadoInscripcion')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('EstadoInscripcion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new EstadoInscripcion('search');
		$model->unsetAttributes();

		if (isset($_GET['EstadoInscripcion']))
			$model->attributes = $_GET['EstadoInscripcion'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new EstadoInscripcion('search');
		$model->unsetAttributes();

		if (isset($_GET['EstadoInscripcion']))
			$model->attributes = $_GET['EstadoInscripcion'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}