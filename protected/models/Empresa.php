<?php

Yii::import('application.models._base.BaseEmpresa');

class Empresa extends BaseEmpresa
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'emp_codigo' => Yii::t('app', 'Codigo'),
			'emp_nombre' => Yii::t('app', 'Nombre'),
			'emp_unidad' => Yii::t('app', 'Unidad'),
			'emp_firma_jefe' => Yii::t('app', 'Firma Jefe'),
			'emp_pie_jefe' => Yii::t('app', 'Pie Jefe'),
			'emp_firma_docente' => Yii::t('app', 'Firma Docente'),
			'emp_pie_docente' => Yii::t('app', 'Pie Docente'),
			'emp_firma_director_espel' => Yii::t('app', 'Firma Director Espel'),
			'emp_pie_director_espel' => Yii::t('app', 'Pie Director Espel'),
			'emp_pie2_director_espel' => Yii::t('app', 'Pie2 Director Espel'),
			'emp_firma_aux' => Yii::t('app', 'Firma Aux'),
			'emp_pie_aux' => Yii::t('app', 'Pie Aux'),
		);
	}
}