<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('ein_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->ein_codigo), array('view', 'id' => $data->ein_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('ein_nombre')); ?>:
	<?php echo GxHtml::encode($data->ein_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ein_estado')); ?>:
	<?php echo GxHtml::encode($data->ein_estado); ?>
	<br />

</div>