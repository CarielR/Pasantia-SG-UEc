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
                
                {name:'par_codigo'},
{name:'par_nombre_participante'},
{name:'par_apellido_participante'},
{name:'par_cedula_participante'},
{name:'par_tipo_participante'},
{name:'par_correo_participante'},
		/*
{name:'par_celular'},
{name:'par_convencional'},
{name:'par_domicilio'},
{name:'par_fecha_inscripcion'},
{name:'par_nombre_repre'},
{name:'par_apellido_repre'},
{name:'par_cedula_repre'},
		*/
                
            ]
        }, cfg));
    }
});
