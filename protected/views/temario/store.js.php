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
                
                {name:'tem_codigo'},
{name:array(
				'name'=>'pla_codigo',
				'value'=>'GxHtml::valueEx($data->plaCodigo)',
				'filter'=>GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'doc_codigo',
				'value'=>'GxHtml::valueEx($data->docCodigo)',
				'filter'=>GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true)),
				)},
{name:'tem_nombre'},
{name:'tem_fecha_inicio'},
{name:'tem_fecha_fin'},
{name:'tem_valor_clases'},
                
            ]
        }, cfg));
    }
});
