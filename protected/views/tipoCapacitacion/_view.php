<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('tca_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->tca_codigo), array('view', 'id' => $data->tca_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('tca_nombre')); ?>:
	<?php echo GxHtml::encode($data->tca_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tca_estado')); ?>:
	<?php echo GxHtml::encode($data->tca_estado); ?>
	<br />

</div>