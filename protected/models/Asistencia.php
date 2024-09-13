<?php

Yii::import('application.models._base.BaseAsistencia');

class Asistencia extends BaseAsistencia
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'asi_codigo' => Yii::t('app', 'Codigo'),
			'ins_codigo' => Yii::t('app', 'Inscripcion'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'asi_porcentaje' => Yii::t('app', 'Porcentaje'),
			'asi_observacion' => Yii::t('app', 'Observacion'),
		);
	}
}