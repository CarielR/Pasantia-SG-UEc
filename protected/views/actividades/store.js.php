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
                
                {name:'act_codigo'},
{name:array(
				'name'=>'con_codigo',
				'value'=>'GxHtml::valueEx($data->conCodigo)',
				'filter'=>GxHtml::listDataEx(Contenido::model()->findAllAttributes(null, true)),
				)},
{name:'act_nombre'},
{name:'act_fecha'},
{name:'act_horas_dictadas'},
{name:'act_horas_act_docente'},
		/*
{name:'act_horas_totales_docente'},
{name:'act_valor_pagar'},
{name:'act_valor_total'},
		*/
                
            ]
        }, cfg));
    }
});
