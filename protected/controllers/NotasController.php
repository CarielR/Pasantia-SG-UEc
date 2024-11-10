<?php

class NotasController extends GxController {

	public function obtenerResultados($cur_codigo, $ein_codigo)
    {
        $sql = "SELECT n.not_codigo, c.cur_codigo, c.cur_nombre, i.ins_codigo, p.par_codigo, 
                       p.par_cedula_participante, p.par_nombre_participante, 
                       p.par_apellido_participante, n.not_nota1, n.not_nota2, 
                       n.not_final, n.not_observacion
                FROM cursos c
                JOIN inscripcion i ON c.cur_codigo = i.cur_codigo
                JOIN participante p ON i.par_codigo = p.par_codigo
                LEFT JOIN notas n ON i.ins_codigo = n.ins_codigo 
                                   AND i.cur_codigo = n.cur_codigo
                WHERE c.cur_codigo = :cur_codigo
                  AND i.ein_codigo = :ein_codigo
                ORDER BY p.par_apellido_participante, p.par_nombre_participante";

        // Ejecutar la consulta con parámetros
        $comando = Yii::app()->db->createCommand($sql);
        $comando->bindParam(':cur_codigo', $cur_codigo, PDO::PARAM_INT);
        $comando->bindParam(':ein_codigo', $ein_codigo, PDO::PARAM_INT);
        $resultado = $comando->queryAll();

        return $resultado;
    }

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Notas'),
		));
	}

	public function actionCreate($id) {
		$model = new Notas;
		
		// Verificar si se reciben los datos del formulario de creación
		if (isset($_POST['Notas'])) {
			$model->attributes = $_POST['Notas'];
	
			// Guardar el modelo Notas
			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					Yii::app()->end();
				} else {
					// Redirigir a la página de administración de notas
					$this->redirect(array('adminNotas', 'id' => $model->not_codigo));
				}
			}
		}


		print_r($id);
	

		$cur_codigo=1;
		$ein_codigo=2;
		//$resultado = $comando->queryAll(); // Obtener los resultados de la consulta
		$resultado = $this->obtenerResultados($cur_codigo, $ein_codigo);
		// Procesar las inscripciones y las notas
		foreach ($resultado as $notas) {
			// Suponiendo que cada $curso incluye las inscripciones y participantes
			$inscripciones = $notas['ins_codigo'];
			$participante = $notas['par_codigo'];
			
			// Verificar si hay notas existentes
			if (empty($notas['not_nota1']) && empty($notas['not_nota2']) && empty($notas['not_final'])) {
				// Crear un nuevo registro de notas con valores por defecto
				$nuevaNota = new Notas();
				$nuevaNota->not_nota1 = 0;
				$nuevaNota->not_nota2 = 0;
				$nuevaNota->not_final = 0;
				$nuevaNota->not_observacion = 'Sin notas registradas';
				$nuevaNota->par_codigo = $notas['par_codigo'];  // Código del participante
				$nuevaNota->cur_codigo = $notas['cur_codigo'];  // Código del curso
				$nuevaNota->ins_codigo = $notas['ins_codigo'];  // Código de la inscripción
				$nuevaNota->save();  // Guardar las notas en la base de datos
			}
		}
		$resultado = $this->obtenerResultados($cur_codigo, $ein_codigo);
		// Renderizar la vista con el modelo y los datos de los participantes
		$this->render('create', array(
			'model' => $model,
			'resultado' => $resultado,  // Pasar los datos de los participantes a la vista
		));
	}
	



	
	public function actionUpdate($id) {

		$model = $this->loadModel($id, 'Cursos');
		$cur_codigo=$id;
		$ein_codigo=2;
		$resultado = $this->obtenerResultados($cur_codigo, $ein_codigo);

		if (isset($_POST['Notas'])) {
			$model->attributes = $_POST['Notas'];

			$this->render('update', array(
				'model' => $model,
				'resultado' => $resultado,
				));
			
		}
		

		
	}




	public function actionUpdateMultiple() {
		$modelNotas = new Notas;
		// $cur_codigo=$id;
		// $ein_codigo=2;
		
		if (isset($_POST['Notas'])) 
		{
			foreach ($_POST['Notas'] as $notaData) {
				
				$nota = Notas::model()->findByPk($notaData['not_codigo']);
		
	
				if ($nota) {
					$nota->not_nota1 = $notaData['not_nota1'];
					$nota->not_nota2 = $notaData['not_nota2'];
					$nota->not_final = ($notaData['not_nota1'] + $notaData['not_nota2'])/2;
					if ($nota->not_final < 14){
						$nota->not_observacion = 'REPROBADO';

					}else{
						$nota->not_observacion = 'APROBADO';
					}

					$nota->save();

				}
			}
			$this->redirect(array('createNotas&id='.$nota->cur_codigo));
	
			// $resultado = $this->obtenerResultados($cur_codigo, $ein_codigo);
		
			// // Redirigir a la vista adecuada después de guardar
			// $this->render('update', array(
			// 	'model' => $nota,
			// 	'resultado' => $resultado, 
			// 	));  // Cambiar a la vista que corresponda
		}
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


	public function actionCreateNotas($id) {
		$model = new Notas;
		
		// Verificar si se reciben los datos del formulario de creación
		if (isset($_POST['Notas'])) {
			$model->attributes = $_POST['Notas'];
	
			// Guardar el modelo Notas
			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					Yii::app()->end();
				} else {
					// Redirigir a la página de administración de notas
					$this->redirect(array('adminNotas', 'id' => $model->not_codigo));
				}
			}
		}


	

		$cur_codigo=$id;
		$ein_codigo=2;
		//$resultado = $comando->queryAll(); // Obtener los resultados de la consulta
		$resultado = $this->obtenerResultados($cur_codigo, $ein_codigo);
		// Procesar las inscripciones y las notas
		foreach ($resultado as $notas) {
			// Suponiendo que cada $curso incluye las inscripciones y participantes
			$inscripciones = $notas['ins_codigo'];
			$participante = $notas['par_codigo'];
			
			// Verificar si hay notas existentes
			if (empty($notas['not_nota1']) && empty($notas['not_nota2']) && empty($notas['not_final'])) {
				// Crear un nuevo registro de notas con valores por defecto
				$nuevaNota = new Notas();
				$nuevaNota->not_nota1 = 0;
				$nuevaNota->not_nota2 = 0;
				$nuevaNota->not_final = 0;
				$nuevaNota->not_observacion = 'Sin notas registradas';
				$nuevaNota->par_codigo = $notas['par_codigo'];  // Código del participante
				$nuevaNota->cur_codigo = $notas['cur_codigo'];  // Código del curso
				$nuevaNota->ins_codigo = $notas['ins_codigo'];  // Código de la inscripción
				$nuevaNota->save();  // Guardar las notas en la base de datos
			}
		}
		$resultado = $this->obtenerResultados($cur_codigo, $ein_codigo);
		// Renderizar la vista con el modelo y los datos de los participantes
		$this->render('create', array(
			'model' => $model,
			'resultado' => $resultado,  // Pasar los datos de los participantes a la vista
		));
	}
	


}