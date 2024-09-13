<?php

/**
 * This is the model base class for the table "anexos".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Anexos".
 *
 * Columns in table "anexos" available as properties of the model,
 * followed by relations of table "anexos" available as properties of the model.
 *
 * @property integer $ane_codigo
 * @property integer $pla_codigo
 * @property string $ane_nombre
 *
 * @property Planificacion $plaCodigo
 */
abstract class BaseAnexos extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'anexos';
	}

	public static function representingColumn() {
		return 'ane_nombre';
	}

	public function rules() {
		return array(
			array('ane_nombre', 'required'),
			array('pla_codigo', 'numerical', 'integerOnly'=>true),
			array('ane_nombre', 'length', 'max'=>60),
			array('pla_codigo, ane_nombre', 'default', 'setOnEmpty' => true, 'value' => null),
			array('ane_codigo, pla_codigo, ane_nombre', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'plaCodigo' => array(self::BELONGS_TO, 'Planificacion', 'pla_codigo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'ane_codigo' => Yii::t('app', 'Ane Codigo'),
			'pla_codigo' => Yii::t('app', 'Pla Codigo'),
			'ane_nombre' => Yii::t('app', 'Ane Nombre'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('ane_codigo', $this->ane_codigo);
		$criteria->compare('pla_codigo', $this->pla_codigo);
		$criteria->compare('ane_nombre', $this->ane_nombre, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}