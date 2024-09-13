<?php

class EmpresaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Empresa'),
		));
	}

	public function actionCreate() {
		$model = new Empresa;


		if (isset($_POST['Empresa'])) {
			$model->attributes = $_POST['Empresa'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->emp_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Empresa');


		if (isset($_POST['Empresa'])) {
			$model->attributes = $_POST['Empresa'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->emp_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Empresa')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Empresa');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Empresa('search');
		$model->unsetAttributes();

		if (isset($_GET['Empresa']))
			$model->attributes = $_GET['Empresa'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Empresa('search');
		$model->unsetAttributes();

		if (isset($_GET['Empresa']))
			$model->attributes = $_GET['Empresa'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}