Ext.asistenciaGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        <?echo "dataIndex:" . $this->generateGridViewColumn($this->modelClass, $column).",\n";?>			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        <?echo "dataIndex:" . $this->generateGridViewColumn($this->modelClass, $column).",\n";?>			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        <?echo "dataIndex:" . $this->generateGridViewColumn($this->modelClass, $column).",\n";?>			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        <?echo "dataIndex:" . $this->generateGridViewColumn($this->modelClass, $column).",\n";?>			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        <?echo "dataIndex:" . $this->generateGridViewColumn($this->modelClass, $column).",\n";?>			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        <?echo "dataIndex:" . $this->generateGridViewColumn($this->modelClass, $column).",\n";?>			
			width:100
		},
                		
	],
	initComponent: function(){
		this.tbar=[
			
		]
		Ext.MyGrid.superclass.initComponent.call(this);
	}
})
