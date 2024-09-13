<?php

Yii::import('application.models._base.BaseAnexos');

class Anexos extends BaseAnexos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
       	public function attributeLabels() {
        	return array(
			'ane_codigo' => Yii::t('app', 'Codigo'),
			'pla_codigo' => Yii::t('app', 'Plainificacion'),
			'ane_nombre' => Yii::t('app', 'Nombre'),
		);
	}

}