<?php

Yii::import('application.models._base.BaseTipoCapacitacion');

class TipoCapacitacion extends BaseTipoCapacitacion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'tca_codigo' => Yii::t('app', 'Codigo'),
			'tca_nombre' => Yii::t('app', 'Nombre'),
			'tca_estado' => Yii::t('app', 'Estado'),
		);
	}
}