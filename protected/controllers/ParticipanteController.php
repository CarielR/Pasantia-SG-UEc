<?php

class ParticipanteController extends GxController {


	public function actionView($id) {
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Participante'),
                ));
                }
	}

        public function actionCreate() {
		$model = new Participante;


		if (isset($_POST['Participante'])) {
			$model->attributes = $_POST['Participante'];

                        //Cambiar a mayusculas
                        $model->par_apellido_participante= strtoupper($model->par_apellido_participante);
                        $model->par_nombre_participante= strtoupper($model->par_nombre_participante);
                        $model->par_apellido_repre= strtoupper($model->par_apellido_repre);
                        $model->par_nombre_repre= strtoupper($model->par_nombre_repre);                        
                        $model->par_domicilio= strtoupper($model->par_domicilio);
                        
			

			$model->par_apellido_repre="0";
                        $model->par_nombre_repre= "0";
                        $model->par_domicilio= "0";
			$model->par_cedula_repre= "0";

                        $cedulaParticpante= $model->par_cedula_participante;
                        $cedulaRepresentante= $model->par_cedula_repre;
                        
                        
                        //--------------------Validar cédulas de identidad--------------------//
                        // Validación de la Cédula participante
                        $validacion=0;
                        if ($validacion==0){
                        //Preguntamos si la cedula consta de 10 digitos
                        if(strlen($cedulaParticpante) == 10){
                            //Obtenemos el digito de la region que sonlos dos primeros digitos
                            $digito_region = substr($cedulaParticpante, 0,2);    
                            //Pregunto si la region existe ecuador se divide en 24 regiones
                            if( $digito_region >= 1 && $digito_region <=24 ){
                                // Extraigo el ultimo digito
                                $ultimo_digito   = substr($cedulaParticpante, 9,1);
                                //Agrupo todos los pares y los sumo
                                $pares = intval(substr($cedulaParticpante,1,1))
                                        + intval(substr($cedulaParticpante,3,1))
                                        + intval(substr($cedulaParticpante,5,1))
                                        + intval(substr($cedulaParticpante,7,1));
                                
                                //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
                                $numero1 = substr($cedulaParticpante,0,1);
                                $numero1 = ($numero1 * 2);
                                if($numero1 > 9 )
                                    $numero1 = ($numero1 - 9); 

                                $numero3 = substr($cedulaParticpante,2,1);
                                $numero3 = ($numero3 * 2);
                                if( $numero3 > 9 )
                                    $numero3 = ($numero3 - 9);

                                $numero5 = substr($cedulaParticpante,4,1);
                                $numero5 = ($numero5 * 2);
                                if( $numero5 > 9 )
                                    $numero5 = ($numero5 - 9); 

                                $numero7 = substr($cedulaParticpante,6,1);
                                $numero7 = ($numero7 * 2);
                                if( $numero7 > 9 )
                                $numero7 = ($numero7 - 9);

                                $numero9 = substr($cedulaParticpante,8,1);
                                $numero9 = ($numero9 * 2);
                                if( $numero9 > 9 )
                                    $numero9 = ($numero9 - 9);

                                $impares = $numero1 + $numero3 + $numero5 + $numero7 + $numero9;

                                //Suma total
                                $suma_total = ($pares + $impares);

                                //extraemos el primero digito
                                $primer_digito_suma = substr(strval($suma_total),0,1);

                                //Obtenemos la decena inmediata
                                $decena = (intval($primer_digito_suma) + 1)  * 10;

                                //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
                                $digito_validador = $decena - $suma_total;

                                //Si el digito validador es = a 10 toma el valor de 0
                                if($digito_validador == 10)
                                    $digito_validador = 0;

                                //Validamos que el digito validador sea igual al de la cedula
                                if($digito_validador == $ultimo_digito){
                                    $validacion++;
                                }else{
                                    Yii::app()->user->setFlash('error',"La cédula del Participante es incorrecta: ". $cedulaParticpante);
                                    $validacion=0;
                                }  
                            }else{
                            // imprimimos en consola si la region no pertenece
                            Yii::app()->user->setFlash('notice',"La cédula del Participante no pertenece al Ecuador");
                            $validacion=0;
                            }
                        }else{
                            //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
                            Yii::app()->user->setFlash('error',"La cédula del Participante tiene menos de 10 dígitos");
                            $validacion=0;
                        } 
                        

                        //--------------------Validación de la Cédula Representante-----------------------
                       	}
                        if($validacion >0)
                        {
                            $sql="SELECT par_cedula_participante FROM participante WHERE par_cedula_participante = '".$cedulaParticpante."';";
                            $participante=Yii::app()->db->createCommand($sql)->queryAll();
                        
                            if ($participante != null){
                                Yii::app()->user->setFlash('notice',"Ya se encuentra registrado, por favor revise las instrucciones para la Inscripción");
                            }else{          
                                if ($model->save()) {
                                //-------Crear usuarios para la inscripción---------
                                    $sql="INSERT INTO cruge_user 
                                        (username, email, password, state) values ('".$cedulaParticpante."', '".$model->par_correo_participante."', md5('".$cedulaParticpante."'), '1')";
                                    $comando = Yii::app() -> db -> createCommand($sql);
                                    $comando -> execute();                       
                                    if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
                                    else
					$this->redirect(array('site/index'));
                                }
                            }
                            
                        }
		}
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Participante');

                if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
                    if (isset($_POST['Participante'])) {
			$model->attributes = $_POST['Participante'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->par_codigo));
			}
                    }

		$this->render('update', array(
				'model' => $model,
				));
                }
    }

	public function actionDelete($id) {
            if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
            }else{
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Participante')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Peticion Invalida. Por favor no repita este pedido nuevamente.'));
            }
        
        }
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Participante');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Participante('search');
		$model->unsetAttributes();

                if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
                
                    if (isset($_GET['Participante']))
                            $model->attributes = $_GET['Participante'];

                    $this->render('admin', array(
                            'model' => $model,
                    ));
                }
        }

	public function actionIndex() {
		$model = new Participante('search');
		$model->unsetAttributes();

                if (Yii::app()->user->isGuest) {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
                    if (isset($_GET['Participante']))
                            $model->attributes = $_GET['Participante'];

                    $this->render('admin', array(
                            'model' => $model,
                    ));
                }
	}

}
