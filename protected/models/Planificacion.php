<?php

Yii::import('application.models._base.BasePlanificacion');

class Planificacion extends BasePlanificacion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'pla_codigo' => Yii::t('app', 'Codigo'),
			'tca_codigo' => Yii::t('app', 'Tipo Capacitacion'),
			'tev_codigo' => Yii::t('app', 'Tipo Evento'),
			'pla_programa' => Yii::t('app', 'Programa'),
			'pla_nombre' => Yii::t('app', 'Curso'),
			'pla_fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
			'pla_fecha_fin' => Yii::t('app', 'Fecha Fin'),
			'pla_lugar' => Yii::t('app', 'Lugar'),
			'pla_curso_codigo' => Yii::t('app', 'Curso Codigo'),
			'pla_antecedentes' => Yii::t('app', 'Antecedentes'),
			'pla_objetivo' => Yii::t('app', 'Objetivo'),
			'pla_metodologia' => Yii::t('app', 'Metodologia'),
			'pla_presupuesto' => Yii::t('app', 'Presupuesto'),
			'pla_disposiciones' => Yii::t('app', 'Disposiciones'),
			'pla_firma_supervisado' => Yii::t('app', 'Firma Supervisado'),
			'pla_pie_supervisado' => Yii::t('app', 'Pie Supervisado'),
			'pla_fecha' => Yii::t('app', 'Fecha'),
			'pla_creado_por' => Yii::t('app', 'Creado Por'),
			'pla_fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
			'pla_modificado_por' => Yii::t('app', 'Modificado Por'),
			'pla_fecha_modificacion' => Yii::t('app', 'Fecha Modificacion'),
                        'pla_certificacion_presupuestaria' => Yii::t('app', 'Cert. Presupuestaria'),
			'pla_instructivo' => Yii::t('app', 'Nº Instructivo'),
		);
	}
}