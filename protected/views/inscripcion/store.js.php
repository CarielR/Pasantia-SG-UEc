jun.configstore = Ext.extend(Ext.data.JsonStore, {
    constructor: function(cfg) {
        cfg = cfg || {};
        jun.configstore.superclass.constructor.call(this, Ext.apply({
            storeId: 'config',
            //url: 'index.php/site/user',
            //autoLoad: true,
            //reader:jun.myReader,
            root: 'results',
            totalProperty: 'total',
            fields: [
                
                {name:'ins_codigo'},
{name:array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'ein_codigo',
				'value'=>'GxHtml::valueEx($data->einCodigo)',
				'filter'=>GxHtml::listDataEx(EstadoInscripcion::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'par_codigo',
				'value'=>'GxHtml::valueEx($data->parCodigo)',
				'filter'=>GxHtml::listDataEx(Participante::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'gru_codigo',
				'value'=>'GxHtml::valueEx($data->gruCodigo)',
				'filter'=>GxHtml::listDataEx(Grupos::model()->findAllAttributes(null, true)),
				)},
{name:'ins_fecha_inscripcion'},
		/*
{name:'ins_factura_pago'},
{name:'ins_pago_inscripcion'},
{name:'ins_fecha_pago_inscripcion'},
{name:'ins_pago_auditoria'},
{name:'ins_pago_valor'},
		*/
                
            ]
        }, cfg));
    }
});
