<?php

class ActividadesController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Actividades'),
		));
	}

	public function actionCreate() {
		$model = new Actividades;


		if (isset($_POST['Actividades'])) {
			$model->attributes = $_POST['Actividades'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->act_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Actividades');


		if (isset($_POST['Actividades'])) {
			$model->attributes = $_POST['Actividades'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->act_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Actividades')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Actividades');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Actividades('search');
		$model->unsetAttributes();

		if (isset($_GET['Actividades']))
			$model->attributes = $_GET['Actividades'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Actividades('search');
		$model->unsetAttributes();

		if (isset($_GET['Actividades']))
			$model->attributes = $_GET['Actividades'];

		$this->render('admin', array(
			'model' => $model,
		));
	}


	public function actionUpdateActividades($id) {
		$model = $this->loadModel($id, 'Actividades');
		$reporte=null;
		$reporteContenido = null;

$cedulaDocente=Yii::app()->user->name;

		$criteriaDocente = new CDbCriteria();
        $criteriaDocente->condition = "doc_cedula = $cedulaDocente";
        $docente= Docente::model()->findAll($criteriaDocente);

$codDocente=$docente[0]->doc_codigo;

		$criteriaTemario = new CDbCriteria();
        $criteriaTemario->condition = "doc_codigo = $codDocente";
        $temario= Temario::model()->findAll($criteriaTemario);

$claveTemario=$temario[0]->tem_codigo;


		if (isset($_POST['Actividades'])) {
			$model->attributes = $_POST['Actividades'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->act_codigo));
			}
		}

		$this->render('updateActividades', array(
				'model' => $model,
				'reporte' => $reporte,
				'reporteContenido' => $reporte,
				'reporteGeneral' => $reporte,
				'clave' => $reporte,
				'claveTemario' => $claveTemario,
				));
	}

}