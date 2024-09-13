<?php

Yii::import('application.models._base.BaseObjetivosEspecificos');

class ObjetivosEspecificos extends BaseObjetivosEspecificos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'obj_codigo' => Yii::t('app', 'Codigo'),
			'pla_codigo' => Yii::t('app', 'Planificacion'),
			'obj_especifico' => Yii::t('app', 'Objetivo Esp.'),
		);
	}
}