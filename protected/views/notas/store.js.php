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
                
                {name:'not_codigo'},
{name:array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'ins_codigo',
				'value'=>'GxHtml::valueEx($data->insCodigo)',
				'filter'=>GxHtml::listDataEx(Inscripcion::model()->findAllAttributes(null, true)),
				)},
{name:'not_nota1'},
{name:'not_nota2'},
{name:'not_final'},
		/*
{name:'not_observacion'},
		*/
                
            ]
        }, cfg));
    }
});
