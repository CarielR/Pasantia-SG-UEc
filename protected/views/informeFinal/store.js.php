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
                
                {name:'inf_codigo'},
{name:array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'tem_codigo',
				'value'=>'GxHtml::valueEx($data->temCodigo)',
				'filter'=>GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true)),
				)},
{name:array(
				'name'=>'doc_codigo',
				'value'=>'GxHtml::valueEx($data->docCodigo)',
				'filter'=>GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true)),
				)},
{name:'inf_nombre'},
{name:'inf_fecha_entrega'},
		/*
{name:'inf_num_asistentes'},
{name:'inf_num_inscritos'},
{name:'inf_num_retirados'},
{name:'inf_num_aprobados'},
{name:'inf_promedio_asistencia'},
{name:'inf_promedio_calificacion'},
{name:'inf_desarrollo'},
{name:'inf_logros'},
{name:'inf_conclusiones'},
{name:'inf_recomendaciones'},
		*/
                
            ]
        }, cfg));
    }
});
