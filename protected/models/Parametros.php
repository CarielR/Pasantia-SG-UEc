<?php

Yii::import('application.models._base.BaseParametros');

class Parametros extends BaseParametros
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        
        public function attributeLabels() {
		return array(
			'emp_codigo' => Yii::t('app', 'Empresa'),
                        'gru_codigo' => Yii::t('app', 'Grupo'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'pla_codigo' => Yii::t('app', 'Planificacion'),
			'par_busqueda' => Yii::t('app', 'Cedula Participante'),
			'par_opcion' => Yii::t('app', 'Opcion'),
			'par_persona' => Yii::t('app', 'Persona'),
		);
	}
}