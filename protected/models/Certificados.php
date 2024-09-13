<?php

Yii::import('application.models._base.BaseCertificados');

class Certificados extends BaseCertificados
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        
        public function attributeLabels() {
		return array(
			'cer_codigo' => Yii::t('app', 'Código Certificado'),
			'par_codigo' => Yii::t('app', 'Participante'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'cer_nombre' => Yii::t('app', 'Archivo Certificado'),
                        'cer_registro' => Yii::t('app', 'Número del Registro'),
                        'cer_constancia' => Yii::t('app', 'Archivo Constancia'),
			'cer_fecha' => Yii::t('app', 'Fecha Certificado'),
			'cer_carga_usuario' => Yii::t('app', 'Usuario carga'),
		);
	}
}