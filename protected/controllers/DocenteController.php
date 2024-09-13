<?php

class DocenteController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Docente'),
		));
	}

	public function actionCreate() {
		$model = new Docente;


		if (isset($_POST['Docente'])) {
			$model->attributes = $_POST['Docente'];

                        $cedulaDocente=$model->doc_cedula;
                        $correoDocente=$model->doc_correo;
			if ($model->save()) {
                            //Añadir al Docente dentro del Cruge
                                    $sql="INSERT INTO cruge_user 
                                        (username, email, password, state) values ('".$cedulaDocente."', '".$correoDocente."', md5('".$cedulaDocente."'), '1')";
                                    $comando = Yii::app() -> db -> createCommand($sql);
                                    $comando -> execute(); 
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->doc_codigo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Docente');


		if (isset($_POST['Docente'])) {
			$model->attributes = $_POST['Docente'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->doc_codigo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Docente')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Docente');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Docente('search');
		$model->unsetAttributes();

		if (isset($_GET['Docente']))
			$model->attributes = $_GET['Docente'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionIndex() {
		$model = new Docente('search');
		$model->unsetAttributes();

		if (isset($_GET['Docente']))
			$model->attributes = $_GET['Docente'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}