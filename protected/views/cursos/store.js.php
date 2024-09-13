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
                
                {name:'cur_codigo'},
{name:array(
				'name'=>'pla_codigo',
				'value'=>'GxHtml::valueEx($data->plaCodigo)',
				'filter'=>GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)),
				)},
{name:'cur_nombre'},
{name:'cur_descripcion'},
{name:'cur_fecha_planificacion'},
{name:'cur_codigo_curso'},
		/*
{name:'cur_objetivo'},
{name:'cur_duracion'},
{name:'cur_dirigido'},
{name:'cur_participantes'},
{name:'cur_costo'},
{name:'cur_fecha_inscripcion'},
{name:'cur_nota_aprob'},
{name:'cur_asistencia_aprob'},
{name:'cur_observaciones'},
{name:array(
					'name' => 'cur_estado',
					'value' => '($data->cur_estado === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					)},
{name:'cur_firma_realiza'},
{name:'cur_pie_firma'},
{name:'cur_creado_por'},
{name:'cur_fecha_creacion'},
{name:'cur_modificado_por'},
{name:'cur_fecha_modificacion'},
		*/
                
            ]
        }, cfg));
    }
});
