<?php

Yii::import('application.models._base.BaseInformeFinal');

class InformeFinal extends BaseInformeFinal
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
	public function attributeLabels() {
		return array(
			'inf_codigo' => Yii::t('app', 'Codigo'),
			'cur_codigo' => Yii::t('app', 'Curso'),
			'tem_codigo' => Yii::t('app', 'Temario'),
			'doc_codigo' => Yii::t('app', 'Docente'),
			'inf_nombre' => Yii::t('app', 'Nombre'),
			'inf_fecha_entrega' => Yii::t('app', 'Fecha Entrega'),
			'inf_num_asistentes' => Yii::t('app', 'Num Asistentes'),
			'inf_num_inscritos' => Yii::t('app', 'Num Inscritos'),
			'inf_num_retirados' => Yii::t('app', 'Num Retirados'),
			'inf_num_aprobados' => Yii::t('app', 'Num Aprobados'),
			'inf_promedio_asistencia' => Yii::t('app', 'Promedio Asistencia'),
			'inf_promedio_calificacion' => Yii::t('app', 'Promedio Calificacion'),
			'inf_desarrollo' => Yii::t('app', 'Desarrollo'),
			'inf_logros' => Yii::t('app', 'Logros'),
			'inf_conclusiones' => Yii::t('app', 'Conclusiones'),
			'inf_recomendaciones' => Yii::t('app', 'Recomendaciones'),
		);
	}

}