Ext.planificacionGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_codigo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'tca_codigo',
				'value'=>'GxHtml::valueEx($data->tcaCodigo)',
				'filter'=>GxHtml::listDataEx(TipoCapacitacion::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'tev_codigo',
				'value'=>'GxHtml::valueEx($data->tevCodigo)',
				'filter'=>GxHtml::listDataEx(TipoEvento::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_programa',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_nombre',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_fecha_inicio',
			
			width:100
		},
                		/*
                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_fecha_fin',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_lugar',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_curso_codigo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_antecedentes',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_objetivo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_metodologia',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_presupuesto',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_disposiciones',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_firma_supervisado',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_pie_supervisado',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_fecha',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_creado_por',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_fecha_creacion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_modificado_por',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'pla_fecha_modificacion',
			
			width:100
		},
                		*/
		
	],
	initComponent: function(){
		this.tbar=[
			
		]
		Ext.MyGrid.superclass.initComponent.call(this);
	}
})
