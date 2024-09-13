<?php

Yii::import('application.models._base.BaseTipoEvento');

class TipoEvento extends BaseTipoEvento
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'tev_codigo' => Yii::t('app', 'Codigo'),
			'tev_nombre' => Yii::t('app', 'Nombre'),
			'tev_estado' => Yii::t('app', 'Estado'),
		);
	}
}