<?php

Yii::import('application.models._base.BaseParticipante');

class Participante extends BaseParticipante
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'par_codigo' => Yii::t('app', 'Codigo'),
			'par_nombre_participante' => Yii::t('app', 'Nombres'),
			'par_apellido_participante' => Yii::t('app', 'Apellidos'),
			'par_cedula_participante' => Yii::t('app', 'Cedula'),
			'par_tipo_participante' => Yii::t('app', 'Tipo'),
			'par_correo_participante' => Yii::t('app', 'Correo'),
			'par_celular' => Yii::t('app', 'Celular'),
			'par_convencional' => Yii::t('app', 'Convencional'),
			'par_domicilio' => Yii::t('app', 'Domicilio'),
			'par_fecha_inscripcion' => Yii::t('app', 'Fecha Inscripcion'),
			'par_nombre_repre' => Yii::t('app', 'Nombre Rep.'),
			'par_apellido_repre' => Yii::t('app', 'Apellido Rep.'),
			'par_cedula_repre' => Yii::t('app', 'Cedula Rep.'),
		);
	}
}