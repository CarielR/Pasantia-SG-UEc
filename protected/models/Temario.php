<?php

Yii::import('application.models._base.BaseTemario');

class Temario extends BaseTemario
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'tem_codigo' => Yii::t('app', 'Codigo'),
			'pla_codigo' => Yii::t('app', 'Planificacion'),
			'doc_codigo' => Yii::t('app', 'Docente'),
			'tem_nombre' => Yii::t('app', 'Nombre'),
			'tem_fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
			'tem_fecha_fin' => Yii::t('app', 'Fecha Fin'),
                        'tem_valor_clases' => Yii::t('app', 'Valor H/Clase'),
                    
		);
	}
}