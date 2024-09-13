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
                
                {name:'doc_codigo'},
{name:'doc_cedula'},
{name:'doc_nombre'},
{name:'doc_apellido'},
{name:'doc_siglas'},
{name:'doc_titulo'},
		/*
{name:'doc_correo'},
{name:'doc_telefono'},
		*/
                
            ]
        }, cfg));
    }
});
