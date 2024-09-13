Ext.docenteGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_codigo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_cedula',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_nombre',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_apellido',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_siglas',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_titulo',
			
			width:100
		},
                		/*
                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_correo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'doc_telefono',
			
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
