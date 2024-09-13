<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('tev_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->tev_codigo), array('view', 'id' => $data->tev_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('tev_nombre')); ?>:
	<?php echo GxHtml::encode($data->tev_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tev_estado')); ?>:
	<?php echo GxHtml::encode($data->tev_estado); ?>
	<br />

</div>