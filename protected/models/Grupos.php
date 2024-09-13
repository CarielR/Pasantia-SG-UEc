<?php

Yii::import('application.models._base.BaseGrupos');

class Grupos extends BaseGrupos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'gru_codigo' => Yii::t('app', 'Codigo'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'gru_nombre' => Yii::t('app', 'Nombre'),
			'gru_horario' => Yii::t('app', 'Horario'),
		);
	}
}