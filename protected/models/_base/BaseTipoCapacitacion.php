<?php

/**
 * This is the model base class for the table "tipo_capacitacion".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TipoCapacitacion".
 *
 * Columns in table "tipo_capacitacion" available as properties of the model,
 * followed by relations of table "tipo_capacitacion" available as properties of the model.
 *
 * @property integer $tca_codigo
 * @property string $tca_nombre
 * @property integer $tca_estado
 *
 * @property Planificacion[] $planificacions
 */
abstract class BaseTipoCapacitacion extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tipo_capacitacion';
	}

	public static function representingColumn() {
		return 'tca_nombre';
	}

	public function rules() {
		return array(
			array('tca_nombre, tca_estado', 'required'),
			array('tca_estado', 'numerical', 'integerOnly'=>true),
			array('tca_nombre', 'length', 'max'=>45),
			array('tca_nombre, tca_estado', 'default', 'setOnEmpty' => true, 'value' => null),
			array('tca_codigo, tca_nombre, tca_estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'planificacions' => array(self::HAS_MANY, 'Planificacion', 'tca_codigo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'tca_codigo' => Yii::t('app', 'Tca Codigo'),
			'tca_nombre' => Yii::t('app', 'Tca Nombre'),
			'tca_estado' => Yii::t('app', 'Tca Estado'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('tca_codigo', $this->tca_codigo);
		$criteria->compare('tca_nombre', $this->tca_nombre, true);
		$criteria->compare('tca_estado', $this->tca_estado);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}