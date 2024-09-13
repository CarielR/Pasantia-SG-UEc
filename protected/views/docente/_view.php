<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('doc_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->doc_codigo), array('view', 'id' => $data->doc_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('doc_cedula')); ?>:
	<?php echo GxHtml::encode($data->doc_cedula); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_nombre')); ?>:
	<?php echo GxHtml::encode($data->doc_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_apellido')); ?>:
	<?php echo GxHtml::encode($data->doc_apellido); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_siglas')); ?>:
	<?php echo GxHtml::encode($data->doc_siglas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_titulo')); ?>:
	<?php echo GxHtml::encode($data->doc_titulo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_correo')); ?>:
	<?php echo GxHtml::encode($data->doc_correo); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_telefono')); ?>:
	<?php echo GxHtml::encode($data->doc_telefono); ?>
	<br />
	*/ ?>

</div>