Ext.anexosGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ane_codigo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
				'name'=>'pla_codigo',
				'value'=>'GxHtml::valueEx($data->plaCodigo)',
				'filter'=>GxHtml::listDataEx(Planificacion::model()->findAllAttributes(null, true)),
				),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'ane_nombre',
			
			width:100
		},
                		
	],
	initComponent: function(){
		this.tbar=[
			
		]
		Ext.MyGrid.superclass.initComponent.call(this);
	}
})
