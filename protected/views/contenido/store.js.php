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
                
                {name:'con_codigo'},
{name:array(
				'name'=>'tem_codigo',
				'value'=>'GxHtml::valueEx($data->temCodigo)',
				'filter'=>GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true)),
				)},
{name:'con_horas_planificadas'},
{name:'con_horas_act_planificadas'},
		
                
            ]
        }, cfg));
    }
});
