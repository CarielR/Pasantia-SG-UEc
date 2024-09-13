<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('obj_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->obj_codigo), array('view', 'id' => $data->obj_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pla_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->plaCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('obj_especifico')); ?>:
	<?php echo GxHtml::encode($data->obj_especifico); ?>
	<br />

</div>