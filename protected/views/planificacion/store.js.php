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
                
                {name:'pla_codigo'},
{name:array(
				'name'=>'tca_codigo',
				'value'=>'GxHtml::valueEx($data->tcaCodigo)',
				'filter'=>GxHtml::listDataEx(TipoCapacitacion::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'tev_codigo',
				'value'=>'GxHtml::valueEx($data->tevCodigo)',
				'filter'=>GxHtml::listDataEx(TipoEvento::model()->findAllAttributes(null, true)),
				)},
{name:'pla_programa'},
{name:'pla_nombre'},
{name:'pla_fecha_inicio'},
		/*
{name:'pla_fecha_fin'},
{name:'pla_lugar'},
{name:'pla_curso_codigo'},
{name:'pla_antecedentes'},
{name:'pla_objetivo'},
{name:'pla_metodologia'},
{name:'pla_presupuesto'},
{name:'pla_disposiciones'},
{name:'pla_firma_supervisado'},
{name:'pla_pie_supervisado'},
{name:'pla_fecha'},
{name:'pla_creado_por'},
{name:'pla_fecha_creacion'},
{name:'pla_modificado_por'},
{name:'pla_fecha_modificacion'},
		*/
                
            ]
        }, cfg));
    }
});
