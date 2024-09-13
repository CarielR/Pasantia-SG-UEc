<?php

Yii::import('application.models._base.BaseNotas');

class Notas extends BaseNotas
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'not_codigo' => Yii::t('app', 'Codigo'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'ins_codigo' => Yii::t('app', 'Inscripcion'),
			'not_nota1' => Yii::t('app', 'Nota1'),
			'not_nota2' => Yii::t('app', 'Nota2'),
			'not_final' => Yii::t('app', 'Final'),
			'not_observacion' => Yii::t('app', 'Observacion'),
		);
	}
}