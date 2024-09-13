<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('emp_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->emp_codigo), array('view', 'id' => $data->emp_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('emp_nombre')); ?>:
	<?php echo GxHtml::encode($data->emp_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_unidad')); ?>:
	<?php echo GxHtml::encode($data->emp_unidad); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_firma_jefe')); ?>:
	<?php echo GxHtml::encode($data->emp_firma_jefe); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_pie_jefe')); ?>:
	<?php echo GxHtml::encode($data->emp_pie_jefe); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_firma_docente')); ?>:
	<?php echo GxHtml::encode($data->emp_firma_docente); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_pie_docente')); ?>:
	<?php echo GxHtml::encode($data->emp_pie_docente); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_firma_director_espel')); ?>:
	<?php echo GxHtml::encode($data->emp_firma_director_espel); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_pie_director_espel')); ?>:
	<?php echo GxHtml::encode($data->emp_pie_director_espel); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_pie2_director_espel')); ?>:
	<?php echo GxHtml::encode($data->emp_pie2_director_espel); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_firma_aux')); ?>:
	<?php echo GxHtml::encode($data->emp_firma_aux); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_pie_aux')); ?>:
	<?php echo GxHtml::encode($data->emp_pie_aux); ?>
	<br />
	*/ ?>

</div>