Ext.informe-finalGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_codigo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'cur_codigo',
				'value'=>'GxHtml::valueEx($data->curCodigo)',
				'filter'=>GxHtml::listDataEx(Cursos::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'tem_codigo',
				'value'=>'GxHtml::valueEx($data->temCodigo)',
				'filter'=>GxHtml::listDataEx(Temario::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'doc_codigo',
				'value'=>'GxHtml::valueEx($data->docCodigo)',
				'filter'=>GxHtml::listDataEx(Docente::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_nombre',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_fecha_entrega',
			
			width:100
		},
                		/*
                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_num_asistentes',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_num_inscritos',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_num_retirados',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_num_aprobados',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_promedio_asistencia',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_promedio_calificacion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_desarrollo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_logros',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_conclusiones',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'inf_recomendaciones',
			
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
