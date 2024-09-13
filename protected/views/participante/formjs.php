jun.pengajuanUi = Ext.extend(Ext.Window, {
    title: 'Tambah Pelayanan Kesehatan',
    modez:1,
    width: 400,
    height: 300,
    layout: 'form',
    modal: true,
    padding: 5,
    closeForm: false,    
    initComponent: function() {
        this.items = [
            {
                xtype: 'form',
                frame: false,
                bodyStyle: 'background-color: #DFE8F6; padding: 10px',
                id:'form-pelkesrjtl',
                labelWidth: 100,
                labelAlign: 'left',
                layout: 'form',
                ref:'formz',
                border:false,
                items: [
                                                                                    
                    <?php echo $form->labelEx($model,'par_nombre_participante'); ?>
                    <?php echo $form->textField($model, 'par_nombre_participante', array('maxlength' => 60,'size' => 60)); ?>
                    <?php echo $form->error($model,'par_nombre_participante'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_apellido_participante'); ?>
                    <?php echo $form->textField($model, 'par_apellido_participante', array('maxlength' => 60,'size' => 60)); ?>
                    <?php echo $form->error($model,'par_apellido_participante'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_cedula_participante'); ?>
                    <?php echo $form->textField($model, 'par_cedula_participante', array('maxlength' => 10,'size' => 10)); ?>
                    <?php echo $form->error($model,'par_cedula_participante'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_tipo_participante'); ?>
                    <?php echo $form->textField($model, 'par_tipo_participante', array('maxlength' => 45,'size' => 45)); ?>
                    <?php echo $form->error($model,'par_tipo_participante'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_correo_participante'); ?>
                    <?php echo $form->textField($model, 'par_correo_participante', array('maxlength' => 100,'size' => 80)); ?>
                    <?php echo $form->error($model,'par_correo_participante'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_celular'); ?>
                    <?php echo $form->textField($model, 'par_celular', array('maxlength' => 15,'size' => 15)); ?>
                    <?php echo $form->error($model,'par_celular'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_convencional'); ?>
                    <?php echo $form->textField($model, 'par_convencional', array('maxlength' => 15,'size' => 15)); ?>
                    <?php echo $form->error($model,'par_convencional'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_domicilio'); ?>
                    <?php echo $form->textField($model, 'par_domicilio', array('maxlength' => 100,'size' => 80)); ?>
                    <?php echo $form->error($model,'par_domicilio'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_fecha_inscripcion'); ?>
                    <?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'par_fecha_inscripcion',
			'value' => $model->par_fecha_inscripcion,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
                    <?php echo $form->error($model,'par_fecha_inscripcion'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_nombre_repre'); ?>
                    <?php echo $form->textField($model, 'par_nombre_repre', array('maxlength' => 60,'size' => 60)); ?>
                    <?php echo $form->error($model,'par_nombre_repre'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_apellido_repre'); ?>
                    <?php echo $form->textField($model, 'par_apellido_repre', array('maxlength' => 60,'size' => 60)); ?>
                    <?php echo $form->error($model,'par_apellido_repre'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'par_cedula_repre'); ?>
                    <?php echo $form->textField($model, 'par_cedula_repre', array('maxlength' => 10,'size' => 10)); ?>
                    <?php echo $form->error($model,'par_cedula_repre'); ?>
                    
                                                    {
                        xtype: 'textfield',
                        fieldLabel: 'No. SJP',
                        hideLabel:true,
                        hidden:true,
                        name:'nosjp',
                        id:'nosjpid',
                        ref:'../nosjp',
                        anchor: '100%'
                    },
                    {
                        xtype: 'datefield',
                        fieldLabel: 'Tanggal Layanan',
                        name:'tglpeljl',
                        id:'tglpeljl',
                        format: 'd M Y',
                        anchor: '100%',
                        allowBlank: false,
                        ref: '../tglpeljl'
                       // value: this.tglsjp
                    },
                    /*
                    {
                        xtype: 'datefield',
                        //xtype: 'textfield',
                        fieldLabel: 'Tanggal layan',
                        format: 'M d Y h:i:s:uA',
                        name:'tglpeljl',
                        id:'tglpeljl',
                        anchor: '100%'
                    },*/ new jun.poliCombo({hiddenName:'polijl', store: jun.rztPoli, allowBlank:false})
                    , new jun.dokterCombo({name:'dokterjl', hiddenName:'dokterjl', store: jun.rztDokter, allowBlank: false})
                    , new jun.jenpelCombo({fieldLabel: 'Nama Pelayanan', ref:'../cmbjenpel', id:'jenpeljlid', name:'jenpeljl', hiddenName:'jenpeljl', store: jun.rztJenpel, allowBlank: false})
                    ,{
                        xtype: 'textfield',
                        ref:'../biaya',
                        fieldLabel: 'Biaya',
                        id:'bytagpeljlid',
                        name:'bytagpeljl',
                        anchor: '100%',
                        allowBlank: false,
                        //maxLength: 8,
                        maskRe: /([0-9.]+)$/,
                               plugins: 'currency',
                                currencyConfig: {
                                symbolBeforeAmount: true,
                                currencySymbol: '', //  = euro sign in unicode
                                decimalSeparator: ',',
                                thousandsSeparator: '.'
                            }
                    }
                    ,{
                        xtype: 'fieldset',
                        title: 'Verifikasi',
                        layout: 'form',
                        hidden:true,
                        collapsible: false,
                        id:'veriffield',
                        ref:'../veriffield',
                        items: [
                            new jun.jenpelCombo({ref:'../../cmbjenpelver', id:'jenpelverjlid',
                                fieldLabel: 'Nama Pelayanan', name:'jenpelverjl', hiddenName:'jenpelverjl',
                                store: jun.rztJenpelver, allowBlank:false}),
                            {
                                xtype: 'textfield',
                                id:'byverpeljlid',         
                                name: 'byverpeljl',
                                fieldLabel: 'Biaya Verifikasi',
                                //name:'byverpeljl',
                                anchor: '100%',
                                allowBlank: false,
                                //maxLength: 8,
                                maskRe: /([0-9.]+)$/,
                                plugins: 'currency',
                                currencyConfig: {
                                    symbolBeforeAmount: true,
                                    currencySymbol: '', //  = euro sign in unicode
                                    decimalSeparator: ',',
                                    thousandsSeparator: '.'
                                }
                            },
                            {
                                 xtype: 'checkbox',
                                 name: 'rjtlEkses',
                                 fieldLabel: 'Ekses',
                                 boxLabel: 'Tandai Sebagai Ekses Klaim',
                                 value: '1'
                            },
                            {
                                 xtype: 'textarea',
                                 id: 'alasanpeljl',
                                 name: 'alasanpeljl',
                                 fieldLabel: 'Catatan',
                                 anchor: '100%'
                            }
                        ]
                    }
                  ]
            }];
        this.fbar = {
            xtype: 'toolbar',
            items: [
                {
                    xtype: 'button',
                    text: 'Simpan',
                    hidden: false,
                    ref:'../btnSave'
                },
                {
                    xtype: 'button',
                    text: 'Simpan & Tutup',
                    ref: '../btnSaveClose'
                },
                {
                    xtype: 'button',
                    text: 'Batal',
                    ref:'../btnCancel'
                }
            ]
        };
        jun.pengajuanUi.superclass.initComponent.call(this);
        this.on('activate', this.onActivate, this);
        this.btnSaveClose.on('click', this.onbtnSaveCloseClick, this);
        this.btnSave.on('click', this.onbtnSaveclick, this);
        this.btnCancel.on('click', this.onbtnCancelclick, this);
        
        this.biaya.on('specialkey', function(field,e){

                if(e.getKey() == e.ENTER){
                    //alert("Test");
                    this.onbtnSaveclick();
                }

        }, this);
    },
    
    onActivate: function(){
              
        this.btnSave.hidden = false;
        
    },
            
    saveForm : function()
    {       
            var urlz;
     
            if(this.modez == 1 || this.modez== 2) {
                    //urlz='index.php/datpelkesrjtl/update/' + this.nosjp.getValue();
                    urlz='index.php/datpelkesrjtl/update2';                
                }else{
                    urlz='index.php/datpelkesrjtl/create/';
                }
             
            Ext.getCmp('form-pelkesrjtl').getForm().submit({
                url:urlz,                
                params:{                                  
                  tglpeljlo: this.tglpeljlo,
                  jenpeljlo: this.jenpeljlo,
                  modez: this.modez
                },
                timeOut: 1000,
                waitMsg: 'Sedang Proses',
                scope: this,

                success: function(f,a){
                    jun.rztRjtl.reload();
                    
                    var response = Ext.decode(a.response.responseText);
         
                    if(this.closeForm){
                    
                        this.close();
                    
                    }else{
                        if(response.data != undefined){
                            Ext.MessageBox.alert("Pelayanan",response.data.msg);
                        }
                        if(this.modez == 0){
                            Ext.getCmp('form-pelkesrjtl').getForm().reset();
                        }
                    }
                    
                },

                failure: function(f,a){
                    
                       if(a.result != undefined){
                            if(Ext.getCmp(a.result.data.id) != undefined){
                              Ext.Msg.alert('Error', a.result.data.msg);
                              Ext.getCmp(a.result.data.id).markInvalid(a.result.data.msg);
                            }else{
                              Ext.Msg.alert("Error",a.result.data.msg);
                            }
                        }else{
                            Ext.MessageBox.alert("Error","Can't Communicate With The Server");
                        }
                        
                }

            });

    },
    
    onbtnSaveCloseClick: function()
    {
        this.closeForm = true;
        this.saveForm(true);
    },
    
    onbtnSaveclick: function()
    {
        this.closeForm = false;
        this.saveForm(false);
    },
    onbtnCancelclick: function(){
        this.close();
    }
   
});