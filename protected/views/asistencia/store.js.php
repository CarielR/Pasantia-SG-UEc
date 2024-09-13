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
                
                {name:'asi_codigo'},
{name:array(
				'name'=>'ins_codigo',
				'value'=>'GxHtml::valueEx($data->insCodigo)',
				'filter'=>GxHtml::listDataEx(Inscripcion::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				)},
{name:'asi_porcentaje'},
{name:'asi_observacion'},
                
            ]
        }, cfg));
    }
});
