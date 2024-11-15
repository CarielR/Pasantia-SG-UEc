<?php

/**
 * This is the model base class for the table "temario".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Temario".
 *
 * Columns in table "temario" available as properties of the model,
 * followed by relations of table "temario" available as properties of the model.
 *
 * @property integer $tem_codigo
 * @property integer $pla_codigo
 * @property integer $doc_codigo
 * @property string $tem_nombre
 * @property string $tem_fecha_inicio
 * @property string $tem_fecha_fin
 *
 * @property Contenido[] $contenidos
 * @property InformeFinal[] $informeFinals
 * @property Docente $docCodigo
 * @property Planificacion $plaCodigo
 */
abstract class BaseTemario extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'temario';
	}

	public static function representingColumn() {
		return 'tem_nombre';
	}

	public function rules() {
		return array(
			array('tem_nombre, tem_fecha_inicio, tem_fecha_fin, tem_valor_clases', 'required'),
			array('pla_codigo, doc_codigo', 'numerical', 'integerOnly'=>true),
			array('tem_nombre', 'length', 'max'=>100),
                        array('tem_valor_clases', 'length', 'max'=>10),
			array('tem_fecha_inicio, tem_fecha_fin', 'safe'),
			array('pla_codigo, doc_codigo, tem_nombre, tem_fecha_inicio, tem_fecha_fin, tem_valor_clases', 'default', 'setOnEmpty' => true, 'value' => null),
			array('tem_codigo, pla_codigo, doc_codigo, tem_nombre, tem_fecha_inicio, tem_fecha_fin, tem_valor_clases', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'contenidos' => array(self::HAS_MANY, 'Contenido', 'tem_codigo'),
			'informeFinals' => array(self::HAS_MANY, 'InformeFinal', 'tem_codigo'),
			'docCodigo' => array(self::BELONGS_TO, 'Docente', 'doc_codigo'),
			'plaCodigo' => array(self::BELONGS_TO, 'Planificacion', 'pla_codigo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'tem_codigo' => Yii::t('app', 'Tem Codigo'),
			'pla_codigo' => Yii::t('app', 'Pla Codigo'),
			'doc_codigo' => Yii::t('app', 'Doc Codigo'),
			'tem_nombre' => Yii::t('app', 'Tem Nombre'),
			'tem_fecha_inicio' => Yii::t('app', 'Tem Fecha Inicio'),
                        'tem_fecha_fin' => Yii::t('app', 'Tem Fecha Fin'),
			'tem_valor_clases' => Yii::t('app', 'Tem Valor Clases'),
		);
	}

	public function search() {
                $criteria = new CDbCriteria;
		$criteria->compare('tem_codigo', $this->tem_codigo);
		$criteria->compare('pla_codigo', $this->pla_codigo);
		$criteria->compare('doc_codigo', $this->doc_codigo);
                $criteria->compare('tem_nombre', $this->tem_nombre, true);
		$criteria->compare('tem_fecha_inicio', $this->tem_fecha_inicio, true);
		$criteria->compare('tem_fecha_fin', $this->tem_fecha_fin, true);
                $criteria->compare('tem_valor_clases', $this->tem_valor_clases, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
        
        public function searchTemario() {
		$criteriaDocente = new CDbCriteria;

                $user=Yii::app()->user->name;
                
                //Obtener el modelo del Docente si se encuentra en la BD
                $criteriaDocente=new CDbCriteria;
                $criteriaDocente->addCondition('doc_cedula='.$user.'');
		$docente = Docente::model()->findAll($criteriaDocente);
                
                $criteria = new CDbCriteria;
		$criteria->compare('tem_codigo', $this->tem_codigo);
		$criteria->compare('pla_codigo', $this->pla_codigo);
		//$criteria->compare('doc_codigo', $this->doc_codigo);
                $criteria->compare('doc_codigo', $this->doc_codigo=$docente[0]->doc_codigo);
		$criteria->compare('tem_nombre', $this->tem_nombre, true);
		$criteria->compare('tem_fecha_inicio', $this->tem_fecha_inicio, true);
		$criteria->compare('tem_fecha_fin', $this->tem_fecha_fin, true);
                $criteria->compare('tem_valor_clases', $this->tem_valor_clases, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
        
        
}