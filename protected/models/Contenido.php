<?php

Yii::import('application.models._base.BaseContenido');

class Contenido extends BaseContenido
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'con_codigo' => Yii::t('app', 'Codigo'),
			'tem_codigo' => Yii::t('app', 'Temario'),
			'con_nombre' => Yii::t('app', 'Nombre'),
                        'con_horas_planificadas' => Yii::t('app', 'Horas Planificadas'),
			'con_horas_act_planificadas' => Yii::t('app', 'Horas Act. Planificadas'),
		);
	}
}