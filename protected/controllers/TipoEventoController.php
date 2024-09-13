<?php

class TipoEventoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'TipoEvento'),
		));
	}

	public function actionCreate() {
		$model = new TipoEvento;


		if (isset($_POST['TipoEvento'])) {
			$model->attributes = $_POST['TipoEvento'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->tev_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'TipoEvento');


		if (isset($_POST['TipoEvento'])) {
			$model->attributes = $_POST['TipoEvento'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->tev_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'TipoEvento')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('TipoEvento');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new TipoEvento('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoEvento']))
			$model->attributes = $_GET['TipoEvento'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new TipoEvento('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoEvento']))
			$model->attributes = $_GET['TipoEvento'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}