<?php

Yii::import('application.models._base.BaseActividades');

class Actividades extends BaseActividades
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

        
        public function attributeLabels() {
		return array(
			'act_codigo' => Yii::t('app', 'Codigo Actividad'),
			'con_codigo' => Yii::t('app', 'Subtema'),
			'act_nombre' => Yii::t('app', 'Actividad'),
			'act_fecha' => Yii::t('app', 'Fecha'),
			'act_horas_dictadas' => Yii::t('app', 'Horas Dictadas'),
			'act_horas_act_docente' => Yii::t('app', 'Horas Act. Docente'),
			'act_horas_totales_docente' => Yii::t('app', 'Horas Totales Docente'),
			'act_valor_pagar' => Yii::t('app', 'Valor Pagar'),
			'act_valor_total' => Yii::t('app', 'Valor Total'),
		);
	}
        
        public function searchTemario() {
		$criteria = new CDbCriteria;

		$criteria->compare('tem_codigo', $this->tem_codigo);
		$criteria->compare('pla_codigo', $this->pla_codigo);
		$criteria->compare('doc_codigo', $this->doc_codigo);
		$criteria->compare('tem_nombre', $this->tem_nombre, true);
		$criteria->compare('tem_fecha_inicio', $this->tem_fecha_inicio, true);
		$criteria->compare('tem_fecha_fin', $this->tem_fecha_fin, true);
                $criteria->compare('tem_valor_clases', $this->tem_valor_clases, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}