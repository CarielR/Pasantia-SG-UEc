<?php

Yii::import('application.models._base.BaseInscripcion');

class Inscripcion extends BaseInscripcion
{
    // Método para obtener la instancia del modelo
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    // Definición de las relaciones
    public function relations()
    {
        return array(
            // Relación con la tabla Participante
            'parCodigo' => array(self::BELONGS_TO, 'Participante', 'par_codigo'),
            
            // Relación con la tabla Curso
            'curso' => array(self::BELONGS_TO, 'Curso', 'cur_codigo'),
            
            // Relación con la tabla Notas
            'notas' => array(self::HAS_MANY, 'Notas', 'ins_codigo'),
        );
    }

    // Etiquetas de los atributos
    public function attributeLabels() {
        return array(
            'ins_codigo' => Yii::t('app', 'Codigo'),
            'cur_codigo' => Yii::t('app', 'Curso'),
            'ein_codigo' => Yii::t('app', 'Est. Inscricpion'),
            'par_codigo' => Yii::t('app', 'Participante'),
            'gru_codigo' => Yii::t('app', 'Grupo'),
            'ins_fecha_inscripcion' => Yii::t('app', 'Fecha Inscripcion'),
            'ins_factura_pago' => Yii::t('app', 'Factura Pago'),
            'ins_pago_inscripcion' => Yii::t('app', 'Pago Inscripcion'),
            'ins_fecha_pago_inscripcion' => Yii::t('app', 'Fecha Pago Inscripcion'),
            'ins_pago_auditoria' => Yii::t('app', 'Pago Auditoria'),
            'ins_pago_valor' => Yii::t('app', 'Pago Valor'),
        );
    }

    // Método de búsqueda con todos los registros
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ins_codigo', $this->ins_codigo);
        $criteria->compare('cur_codigo', $this->cur_codigo);
        $criteria->compare('ein_codigo', $this->ein_codigo);
        $criteria->compare('par_codigo', $this->par_codigo);
        $criteria->compare('gru_codigo', $this->gru_codigo);
        $criteria->compare('ins_fecha_inscripcion', $this->ins_fecha_inscripcion, true);
        $criteria->compare('ins_factura_pago', $this->ins_factura_pago, true);
        $criteria->compare('ins_pago_inscripcion', $this->ins_pago_inscripcion, true);
        $criteria->compare('ins_fecha_pago_inscripcion', $this->ins_fecha_pago_inscripcion, true);
        $criteria->compare('ins_pago_auditoria', $this->ins_pago_auditoria, true);
        $criteria->compare('ins_pago_valor', $this->ins_pago_valor, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    // Método de búsqueda para registros no pagados
    public function search_no_pagados() {
        $criteria = new CDbCriteria;

        $criteria->compare('ins_codigo', $this->ins_codigo);
        $criteria->compare('cur_codigo', $this->cur_codigo);
        $criteria->compare('ein_codigo', '1', true); // Estado de inscripción REGISTRADO
        $criteria->compare('par_codigo', $this->par_codigo);
        $criteria->compare('gru_codigo', $this->gru_codigo);
        $criteria->compare('ins_fecha_inscripcion', $this->ins_fecha_inscripcion, true);
        $criteria->compare('ins_factura_pago', $this->ins_factura_pago, true);
        $criteria->compare('ins_pago_inscripcion', $this->ins_pago_inscripcion, true);
        $criteria->compare('ins_fecha_pago_inscripcion', $this->ins_fecha_pago_inscripcion, true);
        $criteria->compare('ins_pago_auditoria', $this->ins_pago_auditoria, true);
        $criteria->compare('ins_pago_valor', $this->ins_pago_valor, true);

        // Ordenar por apellido y nombre del participante
        $criteria->order = 'parCodigo.par_apellido_participante, parCodigo.par_nombre_participante';
        $criteria->with = array('parCodigo'); // Relación con Participante

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    // Método de búsqueda para registros pagados
    public function search_pagados() {
        $criteria = new CDbCriteria;

        $criteria->compare('ins_codigo', $this->ins_codigo);
        $criteria->compare('cur_codigo', $this->cur_codigo);
        $criteria->compare('ein_codigo', '2', true); // Estado de inscripción INSCRITO
        $criteria->compare('par_codigo', $this->par_codigo);
        $criteria->compare('gru_codigo', $this->gru_codigo);
        $criteria->compare('ins_fecha_inscripcion', $this->ins_fecha_inscripcion, true);
        $criteria->compare('ins_factura_pago', $this->ins_factura_pago, true);
        $criteria->compare('ins_pago_inscripcion', $this->ins_pago_inscripcion, true);
        $criteria->compare('ins_fecha_pago_inscripcion', $this->ins_fecha_pago_inscripcion, true);
        $criteria->compare('ins_pago_auditoria', $this->ins_pago_auditoria, true);
        $criteria->compare('ins_pago_valor', $this->ins_pago_valor, true);

        // Ordenar por apellido y nombre del participante
        $criteria->order = 'parCodigo.par_apellido_participante, parCodigo.par_nombre_participante';
        $criteria->with = array('parCodigo'); // Relación con Participante

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }
}
