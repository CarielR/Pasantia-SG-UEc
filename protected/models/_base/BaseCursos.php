<?php

/**
 * This is the model base class for the table "cursos".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Cursos".
 *
 * Columns in table "cursos" available as properties of the model,
 * followed by relations of table "cursos" available as properties of the model.
 *
 * @property integer $cur_codigo
 * @property integer $pla_codigo
 * @property string $cur_nombre
 * @property string $cur_descripcion
 * @property string $cur_fecha_planificacion
 * @property string $cur_codigo_curso
 * @property string $cur_objetivo
 * @property string $cur_duracion
 * @property string $cur_dirigido
 * @property integer $cur_participantes
 * @property string $cur_costo
 * @property string $cur_fecha_inscripcion
 * @property string $cur_nota_aprob
 * @property string $cur_asistencia_aprob
 * @property string $cur_observaciones
 * @property integer $cur_estado
 * @property string $cur_firma_realiza
 * @property string $cur_pie_firma
 * @property string $cur_creado_por
 * @property string $cur_fecha_creacion
 * @property string $cur_modificado_por
 * @property string $cur_fecha_modificacion
 *
 * @property Asistencia[] $asistencias
 * @property Planificacion $plaCodigo
 * @property Grupos[] $gruposes
 * @property InformeFinal[] $informeFinals
 * @property Inscripcion[] $inscripcions
 * @property Notas[] $notases
 */
abstract class BaseCursos extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'cursos';
	}

	public static function representingColumn() {
		return 'cur_nombre';
	}

	public function rules() {
		return array(
			array('cur_nombre', 'required'),
			array('pla_codigo, cur_participantes, cur_estado', 'numerical', 'integerOnly'=>true),
			array('cur_nombre, cur_dirigido, cur_firma_realiza, cur_pie_firma', 'length', 'max'=>100),
			array('cur_codigo_curso, cur_duracion, cur_asistencia_aprob, cur_creado_por, cur_modificado_por', 'length', 'max'=>45),
                        array('cur_costo, cur_nota_aprob', 'length', 'max'=>10),
			array('cur_descripcion, cur_fecha_planificacion, cur_objetivo, cur_fecha_inscripcion, cur_observaciones, cur_fecha_creacion, cur_fecha_modificacion', 'safe'),
			array('pla_codigo, cur_nombre, cur_descripcion, cur_fecha_planificacion, cur_codigo_curso, cur_objetivo, cur_duracion, cur_dirigido, cur_participantes, cur_costo, cur_fecha_inscripcion, cur_nota_aprob, cur_asistencia_aprob, cur_observaciones, cur_estado, cur_firma_realiza, cur_pie_firma, cur_creado_por, cur_fecha_creacion, cur_modificado_por, cur_fecha_modificacion', 'default', 'setOnEmpty' => true, 'value' => null),
			array('cur_codigo, pla_codigo, cur_nombre, cur_descripcion, cur_fecha_planificacion, cur_codigo_curso, cur_objetivo, cur_duracion, cur_dirigido, cur_participantes, cur_costo, cur_fecha_inscripcion, cur_nota_aprob, cur_asistencia_aprob, cur_observaciones, cur_estado, cur_firma_realiza, cur_pie_firma, cur_creado_por, cur_fecha_creacion, cur_modificado_por, cur_fecha_modificacion', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'asistencias' => array(self::HAS_MANY, 'Asistencia', 'cur_codigo'),
			'plaCodigo' => array(self::BELONGS_TO, 'Planificacion', 'pla_codigo'),
			'gruposes' => array(self::HAS_MANY, 'Grupos', 'cur_codigo'),
			'informeFinals' => array(self::HAS_MANY, 'InformeFinal', 'cur_codigo'),
			'inscripcions' => array(self::HAS_MANY, 'Inscripcion', 'cur_codigo'),
			'notases' => array(self::HAS_MANY, 'Notas', 'cur_codigo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'cur_codigo' => Yii::t('app', 'Cur Codigo'),
			'pla_codigo' => Yii::t('app', 'Pla Codigo'),
			'cur_nombre' => Yii::t('app', 'Cur Nombre'),
			'cur_descripcion' => Yii::t('app', 'Cur Descripcion'),
			'cur_fecha_planificacion' => Yii::t('app', 'Cur Fecha Planificacion'),
			'cur_codigo_curso' => Yii::t('app', 'Cur Codigo Curso'),
			'cur_objetivo' => Yii::t('app', 'Cur Objetivo'),
			'cur_duracion' => Yii::t('app', 'Cur Duracion'),
			'cur_dirigido' => Yii::t('app', 'Cur Dirigido'),
			'cur_participantes' => Yii::t('app', 'Cur Participantes'),
			'cur_costo' => Yii::t('app', 'Cur Costo'),
			'cur_fecha_inscripcion' => Yii::t('app', 'Cur Fecha Inscripcion'),
			'cur_nota_aprob' => Yii::t('app', 'Cur Nota Aprob'),
			'cur_asistencia_aprob' => Yii::t('app', 'Cur Asistencia Aprob'),
			'cur_observaciones' => Yii::t('app', 'Cur Observaciones'),
			'cur_estado' => Yii::t('app', 'Cur Estado'),
			'cur_firma_realiza' => Yii::t('app', 'Cur Firma Realiza'),
			'cur_pie_firma' => Yii::t('app', 'Cur Pie Firma'),
			'cur_creado_por' => Yii::t('app', 'Cur Creado Por'),
			'cur_fecha_creacion' => Yii::t('app', 'Cur Fecha Creacion'),
			'cur_modificado_por' => Yii::t('app', 'Cur Modificado Por'),
			'cur_fecha_modificacion' => Yii::t('app', 'Cur Fecha Modificacion'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('cur_codigo', $this->cur_codigo);
		$criteria->compare('pla_codigo', $this->pla_codigo);
		$criteria->compare('cur_nombre', $this->cur_nombre, true);
		$criteria->compare('cur_descripcion', $this->cur_descripcion, true);
		$criteria->compare('cur_fecha_planificacion', $this->cur_fecha_planificacion, true);
		$criteria->compare('cur_codigo_curso', $this->cur_codigo_curso, true);
		$criteria->compare('cur_objetivo', $this->cur_objetivo, true);
		$criteria->compare('cur_duracion', $this->cur_duracion, true);
		$criteria->compare('cur_dirigido', $this->cur_dirigido, true);
		$criteria->compare('cur_participantes', $this->cur_participantes);
		$criteria->compare('cur_costo', $this->cur_costo, true);
		$criteria->compare('cur_fecha_inscripcion', $this->cur_fecha_inscripcion, true);
		$criteria->compare('cur_nota_aprob', $this->cur_nota_aprob, true);
		$criteria->compare('cur_asistencia_aprob', $this->cur_asistencia_aprob, true);
		$criteria->compare('cur_observaciones', $this->cur_observaciones, true);
		$criteria->compare('cur_estado', $this->cur_estado);
		$criteria->compare('cur_firma_realiza', $this->cur_firma_realiza, true);
		$criteria->compare('cur_pie_firma', $this->cur_pie_firma, true);
		$criteria->compare('cur_creado_por', $this->cur_creado_por, true);
		$criteria->compare('cur_fecha_creacion', $this->cur_fecha_creacion, true);
		$criteria->compare('cur_modificado_por', $this->cur_modificado_por, true);
		$criteria->compare('cur_fecha_modificacion', $this->cur_fecha_modificacion, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}