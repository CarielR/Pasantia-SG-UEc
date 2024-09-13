<?php

Yii::import('application.models._base.BaseDocente');

class Docente extends BaseDocente
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'doc_codigo' => Yii::t('app', 'Codigo'),
			'doc_cedula' => Yii::t('app', 'Cedula'),
			'doc_nombre' => Yii::t('app', 'Nombres'),
			'doc_apellido' => Yii::t('app', 'Apellidos'),
			'doc_siglas' => Yii::t('app', 'Siglas'),
			'doc_titulo' => Yii::t('app', 'Titulo'),
			'doc_correo' => Yii::t('app', 'Correo'),
			'doc_telefono' => Yii::t('app', 'Telefono'),
		);
	}
}