<?php

/**
 * This is the model base class for the table "participante".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Participante".
 *
 * Columns in table "participante" available as properties of the model,
 * followed by relations of table "participante" available as properties of the model.
 *
 * @property integer $par_codigo
 * @property string $par_nombre_participante
 * @property string $par_apellido_participante
 * @property string $par_cedula_participante
 * @property string $par_tipo_participante
 * @property string $par_correo_participante
 * @property string $par_celular
 * @property string $par_convencional
 * @property string $par_domicilio
 * @property string $par_fecha_inscripcion
 * @property string $par_nombre_repre
 * @property string $par_apellido_repre
 * @property string $par_cedula_repre
 *
 * @property Inscripcion[] $inscripcions
 */
abstract class BaseParticipante extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'participante';
	}

	public static function representingColumn() {
		return 'par_nombre_participante';
	}

	public function rules() {
		return array(
			array('par_nombre_participante, par_apellido_participante, par_cedula_participante, par_tipo_participante, par_correo_participante, par_celular, par_convencional, par_domicilio, par_fecha_inscripcion, par_nombre_repre, par_apellido_repre, par_cedula_repre', 'required'),
			array('par_nombre_participante, par_apellido_participante, par_nombre_repre, par_apellido_repre', 'length', 'max'=>60),
			array('par_cedula_participante, par_cedula_repre', 'length', 'max'=>10),
			array('par_tipo_participante', 'length', 'max'=>45),
			array('par_correo_participante, par_domicilio', 'length', 'max'=>100),
			array('par_celular, par_convencional', 'length', 'max'=>15),
			array('par_fecha_inscripcion', 'safe'),
			array('par_nombre_participante, par_apellido_participante, par_cedula_participante, par_tipo_participante, par_correo_participante, par_celular, par_convencional, par_domicilio, par_fecha_inscripcion, par_nombre_repre, par_apellido_repre, par_cedula_repre', 'default', 'setOnEmpty' => true, 'value' => null),
			array('par_codigo, par_nombre_participante, par_apellido_participante, par_cedula_participante, par_tipo_participante, par_correo_participante, par_celular, par_convencional, par_domicilio, par_fecha_inscripcion, par_nombre_repre, par_apellido_repre, par_cedula_repre', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'inscripcions' => array(self::HAS_MANY, 'Inscripcion', 'par_codigo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'par_codigo' => Yii::t('app', 'Par Codigo'),
			'par_nombre_participante' => Yii::t('app', 'Par Nombre Participante'),
			'par_apellido_participante' => Yii::t('app', 'Par Apellido Participante'),
			'par_cedula_participante' => Yii::t('app', 'Par Cedula Participante'),
			'par_tipo_participante' => Yii::t('app', 'Par Tipo Participante'),
			'par_correo_participante' => Yii::t('app', 'Par Correo Participante'),
			'par_celular' => Yii::t('app', 'Par Celular'),
			'par_convencional' => Yii::t('app', 'Par Convencional'),
			'par_domicilio' => Yii::t('app', 'Par Domicilio'),
			'par_fecha_inscripcion' => Yii::t('app', 'Par Fecha Inscripcion'),
			'par_nombre_repre' => Yii::t('app', 'Par Nombre Repre'),
			'par_apellido_repre' => Yii::t('app', 'Par Apellido Repre'),
			'par_cedula_repre' => Yii::t('app', 'Par Cedula Repre'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('par_codigo', $this->par_codigo);
		$criteria->compare('par_nombre_participante', $this->par_nombre_participante, true);
		$criteria->compare('par_apellido_participante', $this->par_apellido_participante, true);
		$criteria->compare('par_cedula_participante', $this->par_cedula_participante, true);
		$criteria->compare('par_tipo_participante', $this->par_tipo_participante, true);
		$criteria->compare('par_correo_participante', $this->par_correo_participante, true);
		$criteria->compare('par_celular', $this->par_celular, true);
		$criteria->compare('par_convencional', $this->par_convencional, true);
		$criteria->compare('par_domicilio', $this->par_domicilio, true);
		$criteria->compare('par_fecha_inscripcion', $this->par_fecha_inscripcion, true);
		$criteria->compare('par_nombre_repre', $this->par_nombre_repre, true);
		$criteria->compare('par_apellido_repre', $this->par_apellido_repre, true);
		$criteria->compare('par_cedula_repre', $this->par_cedula_repre, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}