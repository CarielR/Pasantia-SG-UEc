<?php

Yii::import('application.models._base.BaseCursos');

class Cursos extends BaseCursos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels() {
		return array(
			'cur_codigo' => Yii::t('app', 'Codigo'),
			'pla_codigo' => Yii::t('app', 'Planificacion'),
			'cur_nombre' => Yii::t('app', 'Nombre'),
			'cur_descripcion' => Yii::t('app', 'Descripcion'),
			'cur_fecha_planificacion' => Yii::t('app', 'Fecha Planificacion'),
			'cur_codigo_curso' => Yii::t('app', 'Codigo Curso'),
			'cur_objetivo' => Yii::t('app', 'Objetivo'),
			'cur_duracion' => Yii::t('app', 'Duracion'),
			'cur_dirigido' => Yii::t('app', 'Dirigido'),
			'cur_participantes' => Yii::t('app', 'Participantes'),
			'cur_costo' => Yii::t('app', 'Costo'),
			'cur_fecha_inscripcion' => Yii::t('app', 'Fecha Inscripcion'),
			'cur_nota_aprob' => Yii::t('app', 'Nota Aprobación'),
			'cur_asistencia_aprob' => Yii::t('app', 'Asistencia Aprobación'),
			'cur_observaciones' => Yii::t('app', 'Observaciones'),
			'cur_estado' => Yii::t('app', 'Estado'),
			'cur_firma_realiza' => Yii::t('app', 'Realizado por:'),
			'cur_pie_firma' => Yii::t('app', 'Pie de Firma'),
			'cur_creado_por' => Yii::t('app', 'Creado Por'),
			'cur_fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
			'cur_modificado_por' => Yii::t('app', 'Modificado Por'),
			'cur_fecha_modificacion' => Yii::t('app', 'Fecha Modificacion'),
		);
	}
}