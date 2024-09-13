Ext.cursosGrid=Ext.extend(Ext.grid.GridPanel ,{
xtype:"grid",
	title:"My Grid",
	width:400,
	height:250,
	columns:[
                        {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_codigo',
			
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
                        dataIndex:'cur_nombre',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_descripcion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_fecha_planificacion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_codigo_curso',
			
			width:100
		},
                		/*
                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_objetivo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_duracion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_dirigido',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_participantes',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_costo',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_fecha_inscripcion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_nota_aprob',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_asistencia_aprob',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_observaciones',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:array(
					'name' => 'cur_estado',
					'value' => '($data->cur_estado === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_firma_realiza',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_pie_firma',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_creado_por',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_fecha_creacion',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_modificado_por',
			
			width:100
		},
                                {
			header:"Column 1",
			sortable:true,
			resizable:true,
                        dataIndex:'cur_fecha_modificacion',
			
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
