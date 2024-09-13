Ext.inscripcionGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_codigo',
			
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
				'name'=>'ein_codigo',
				'value'=>'GxHtml::valueEx($data->einCodigo)',
				'filter'=>GxHtml::listDataEx(EstadoInscripcion::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'par_codigo',
				'value'=>'GxHtml::valueEx($data->parCodigo)',
				'filter'=>GxHtml::listDataEx(Participante::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'gru_codigo',
				'value'=>'GxHtml::valueEx($data->gruCodigo)',
				'filter'=>GxHtml::listDataEx(Grupos::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_fecha_inscripcion',
			
			width:100
		},
                		/*
                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_factura_pago',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_pago_inscripcion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_fecha_pago_inscripcion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_pago_auditoria',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ins_pago_valor',
			
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
