<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('ane_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->ane_codigo), array('view', 'id' => $data->ane_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pla_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->plaCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ane_nombre')); ?>:
	<?php echo GxHtml::encode($data->ane_nombre); ?>
	<br />

</div>