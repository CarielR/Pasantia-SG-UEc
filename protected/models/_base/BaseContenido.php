<?php

/**
 * This is the model base class for the table "contenido".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Contenido".
 *
 * Columns in table "contenido" available as properties of the model,
 * followed by relations of table "contenido" available as properties of the model.
 *
 * @property integer $con_codigo
 * @property integer $tem_codigo
 * @property string $con_nombre
 * @property string $con_fecha
 * @property string $con_valor_hora_clase
 * @property string $con_horas_dictadas
 * @property string $con_horas_act_docente
 * @property string $con_horas_totales_docente
 * @property string $con_valor_pagar
 * @property string $con_valor_total
 *
 * @property Temario $temCodigo
 */
abstract class BaseContenido extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'contenido';
	}

	public static function representingColumn() {
		return 'con_nombre';
	}

	public function rules() {
		return array(
			array('con_nombre, con_horas_planificadas, con_horas_act_planificadas', 'required'),
			array('tem_codigo', 'numerical', 'integerOnly'=>true),
			array('con_nombre', 'length', 'max'=>100),
			array('con_horas_planificadas, con_horas_act_planificadas', 'length', 'max'=>10),
			array('tem_codigo, con_nombre, con_horas_planificadas, con_horas_act_planificadas', 'default', 'setOnEmpty' => true, 'value' => null),
			array('con_codigo, tem_codigo, con_nombre, con_horas_planificadas, con_horas_act_planificadas', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'temCodigo' => array(self::BELONGS_TO, 'Temario', 'tem_codigo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'con_codigo' => Yii::t('app', 'Con Codigo'),
			'tem_codigo' => Yii::t('app', 'Tem Codigo'),
			'con_nombre' => Yii::t('app', 'Con Nombre'),
			'con_horas_planificadas' => Yii::t('app', 'Con Horas Planificadas'),
			'con_horas_act_planificadas' => Yii::t('app', 'Con Horas Act Planificadas'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('con_codigo', $this->con_codigo);
		$criteria->compare('tem_codigo', $this->tem_codigo);
		$criteria->compare('con_nombre', $this->con_nombre, true);
		$criteria->compare('con_horas_planificadas', $this->con_horas_planificadas, true);
		$criteria->compare('con_horas_act_planificadas', $this->con_horas_act_planificadas, true);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}