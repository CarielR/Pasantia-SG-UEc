<?php
/*
	aqui: $this->beginContent('//layouts/main'); indica que este layout se amolda 
	al layout que se haya definido para todo el sistema, y dentro de el colocara
	su propio layout para amoldar a un CPortlet.
	
	esto es para asegurar que el sistema disponga de un portlet, 
	esto es casi lo mismo que haber puesto en UiController::layout = '//layouts/column2'
	a diferencia que aqui se indica el uso de un archivo CSS para estilos predefinidos
	
	Yii::app()->layout asegura que estemos insertando este contenido en el layout que
	se ha definido para el sistema principal.
*/
?>
<?php 
	$this->beginContent('//layouts/main'); 
?>

<?php	
	if(Yii::app()->user->isSuperAdmin)
		echo Yii::app()->user->ui->superAdminNote();
?>
   <div id="main">
	<div class="block">
			<div class="content">
                            <div class="inner">
			<?php echo $content; ?>
            </div>
		</div><!-- content -->
	</div>
    <?php echo $this->renderPartial('//layouts/_footer'); ?>
    </div>
	<?php if(Yii::app()->user->checkAccess('admin')) { ?>	
	<div id="sidebar">
    	<div class="block">
        <h3>Operaciones</h3>
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>ucfirst(CrugeTranslator::t("")),
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>Yii::app()->user->ui->adminItems,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
        </div>
	</div><!-- sidebar -->
	
	<?php } ?>
	

<?php $this->endContent(); ?>