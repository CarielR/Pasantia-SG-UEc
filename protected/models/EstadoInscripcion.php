<?php

Yii::import('application.models._base.BaseEstadoInscripcion');

class EstadoInscripcion extends BaseEstadoInscripcion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'ein_codigo' => Yii::t('app', 'Codigo'),
			'ein_nombre' => Yii::t('app', 'Nombre'),
			'ein_estado' => Yii::t('app', 'Estado'),
		);
	}
}