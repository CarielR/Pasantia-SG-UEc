<?php

Yii::import('application.models._base.BaseAsistencia');

class Asistencia extends BaseAsistencia
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function attributeLabels() {
		return array(
			'asi_codigo' => Yii::t('app', 'Codigo_asist'),
			'ins_codigo' => Yii::t('app', 'Participante'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'asi_fecha' => Yii::t('app', 'Fecha'),
			'asi_asistencia' => Yii::t('app', 'Asistencia'),
			'asi_observacion' => Yii::t('app', 'Observacion'),
		);
	}

}