<?php

class AsistenciaController extends GxController {

    public function obtenerAsistencia($cur_codigo, $ein_codigo, $fecha) {
        $sql = "SELECT c.cur_codigo, c.cur_nombre, p.par_codigo, p.par_cedula_participante, 
                       p.par_nombre_participante, p.par_apellido_participante, a.asi_fecha,
                       a.asi_observacion
                FROM cursos c
                JOIN inscripcion i ON c.cur_codigo = i.cur_codigo
                JOIN participante p ON i.par_codigo = p.par_codigo
                LEFT JOIN asistencia a ON i.ins_codigo = a.ins_codigo AND i.cur_codigo = a.cur_codigo AND a.asi_fecha = :fecha
                WHERE c.cur_codigo = :cur_codigo
                  AND i.ein_codigo = :ein_codigo
                ORDER BY p.par_apellido_participante, p.par_nombre_participante, a.asi_fecha";

        $comando = Yii::app()->db->createCommand($sql);
        $comando->bindParam(':cur_codigo', $cur_codigo, PDO::PARAM_INT);
        $comando->bindParam(':ein_codigo', $ein_codigo, PDO::PARAM_INT);
        $comando->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        return $comando->queryAll();
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Asistencia'),
        ));
    }

    public function actionCreate($id) {
        $model = new Asistencia;

        // Verificar si se ha recibido el parámetro cur_codigo
        if (!$id) {
            throw new CHttpException(400, 'Parámetro curso inválido.');
        }

        if (isset($_POST['Asistencia'])) {
            foreach ($_POST['Asistencia'] as $asistenciaData) {
                $asistencia = new Asistencia();
                $asistencia->attributes = $asistenciaData;
                $asistencia->cur_codigo = $id;

                if ($asistencia->validate()) {
                    $asistencia->save();
                }
            }
            $this->redirect(array('adminAsistencia', 'id' => $id));
        }

        $cur_codigo = $id;  // Obtener código del curso desde la URL
        $ein_codigo = 2;    // Código de inscripción (valor ejemplo)
        $fecha = date('Y-m-d'); // Fecha actual por defecto
        $resultado = $this->obtenerAsistencia($cur_codigo, $ein_codigo, $fecha);

        if (empty($resultado)) {
            Yii::log('No se encontraron registros de asistencia.', CLogger::LEVEL_WARNING);
        } else {
            Yii::log('Registros encontrados: ' . print_r($resultado, true), CLogger::LEVEL_INFO);
        }

        $this->render('create', array(
            'resultado' => $resultado,
        ));
    }

    public function actionUpdate($id) {
        // Obtener el código del curso desde la URL (se espera como parámetro)
        if (!$id) {
            throw new CHttpException(400, 'Parámetro curso inválido.');
        }

        $cur_codigo = $id;
        $ein_codigo = 2;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : date('Y-m-d');

        if (isset($_POST['consultar'])) {
            // Consultar asistencia para la fecha seleccionada
            $resultado = $this->obtenerAsistencia($cur_codigo, $ein_codigo, $fecha);
        } elseif (isset($_POST['generar'])) {
            // Lógica para generar asistencia en la fecha seleccionada
            $resultado = $this->obtenerAsistencia($cur_codigo, $ein_codigo, $fecha);

            // Si no hay registros, generar asistencia para cada participante inscrito
            if (empty($resultado)) {
                $inscripciones = Yii::app()->db->createCommand()
                    ->select('i.par_codigo')
                    ->from('inscripcion i')
                    ->where('i.cur_codigo = :cur_codigo AND i.ein_codigo = :ein_codigo', [
                        ':cur_codigo' => $cur_codigo,
                        ':ein_codigo' => $ein_codigo,
                    ])
                    ->queryAll();

                // Generar registros de asistencia vacíos
                foreach ($inscripciones as $inscripcion) {
                    $asistencia = new Asistencia();
                    $asistencia->par_codigo = $inscripcion['par_codigo'];
                    $asistencia->asi_fecha = $fecha;
                    $asistencia->cur_codigo = $cur_codigo;
                    $asistencia->asi_asistencia = 0; // Valor por defecto: no asistió
                    $asistencia->asi_observacion = '';
                    $asistencia->save();
                }

                // Volver a consultar asistencia después de generar los registros
                $resultado = $this->obtenerAsistencia($cur_codigo, $ein_codigo, $fecha);
            }
        } else {
            // Por defecto, consultar la asistencia de la fecha actual
            $resultado = $this->obtenerAsistencia($cur_codigo, $ein_codigo, $fecha);
        }

        // Guardar cambios en asistencia
        if (isset($_POST['Asistencia'])) {
            foreach ($_POST['Asistencia'] as $asistenciaData) {
                $asistencia = Asistencia::model()->findByAttributes([
                    'par_codigo' => $asistenciaData['par_codigo'],
                    'asi_fecha' => $fecha,
                ]);

                if (!$asistencia) {
                    $asistencia = new Asistencia();
                    $asistencia->par_codigo = $asistenciaData['par_codigo'];
                    $asistencia->asi_fecha = $fecha;
                }

                $asistencia->asi_asistencia = isset($asistenciaData['asi_asistencia']) ? 1 : 0;
                $asistencia->asi_observacion = $asistenciaData['asi_observacion'];
                $asistencia->save();
            }

            $this->redirect(array('create', 'id' => $cur_codigo, 'fecha' => $fecha));
        }

        $this->render('update', array(
            'resultado' => $resultado,
        ));
    }

    public function actionAdmin() {
        $model = new Asistencia('search');
        $model->unsetAttributes();

        if (isset($_GET['Asistencia']))
            $model->attributes = $_GET['Asistencia'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionIndex() {
        $model = new Asistencia('search');
        $model->unsetAttributes();

        if (isset($_GET['Asistencia']))
            $model->attributes = $_GET['Asistencia'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
}
