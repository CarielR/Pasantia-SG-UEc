<?php

class TipoCapacitacionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'TipoCapacitacion'),
		));
	}

	public function actionCreate() {
		$model = new TipoCapacitacion;


		if (isset($_POST['TipoCapacitacion'])) {
			$model->attributes = $_POST['TipoCapacitacion'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->tca_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'TipoCapacitacion');


		if (isset($_POST['TipoCapacitacion'])) {
			$model->attributes = $_POST['TipoCapacitacion'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->tca_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'TipoCapacitacion')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('TipoCapacitacion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new TipoCapacitacion('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoCapacitacion']))
			$model->attributes = $_GET['TipoCapacitacion'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new TipoCapacitacion('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoCapacitacion']))
			$model->attributes = $_GET['TipoCapacitacion'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}