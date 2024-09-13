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
                
                {name:'emp_codigo'},
{name:'emp_nombre'},
{name:'emp_unidad'},
{name:'emp_firma_jefe'},
{name:'emp_pie_jefe'},
{name:'emp_firma_docente'},
		/*
{name:'emp_pie_docente'},
{name:'emp_firma_director_espel'},
{name:'emp_pie_director_espel'},
{name:'emp_pie2_director_espel'},
{name:'emp_firma_aux'},
{name:'emp_pie_aux'},
		*/
                
            ]
        }, cfg));
    }
});
