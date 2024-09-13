<?php

class NotasController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Notas'),
		));
	}

	public function actionCreate() {
		$model = new Notas;


		if (isset($_POST['Notas'])) {
			$model->attributes = $_POST['Notas'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->not_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Notas');


		if (isset($_POST['Notas'])) {
			$model->attributes = $_POST['Notas'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->not_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Notas')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Notas');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Notas('search');
		$model->unsetAttributes();

		if (isset($_GET['Notas']))
			$model->attributes = $_GET['Notas'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Notas('search');
		$model->unsetAttributes();

		if (isset($_GET['Notas']))
			$model->attributes = $_GET['Notas'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}