<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('par_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->par_codigo), array('view', 'id' => $data->par_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('par_nombre_participante')); ?>:
	<?php echo GxHtml::encode($data->par_nombre_participante); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_apellido_participante')); ?>:
	<?php echo GxHtml::encode($data->par_apellido_participante); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_cedula_participante')); ?>:
	<?php echo GxHtml::encode($data->par_cedula_participante); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_tipo_participante')); ?>:
	<?php echo GxHtml::encode($data->par_tipo_participante); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_correo_participante')); ?>:
	<?php echo GxHtml::encode($data->par_correo_participante); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_celular')); ?>:
	<?php echo GxHtml::encode($data->par_celular); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('par_convencional')); ?>:
	<?php echo GxHtml::encode($data->par_convencional); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_domicilio')); ?>:
	<?php echo GxHtml::encode($data->par_domicilio); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_fecha_inscripcion')); ?>:
	<?php echo GxHtml::encode($data->par_fecha_inscripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_nombre_repre')); ?>:
	<?php echo GxHtml::encode($data->par_nombre_repre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_apellido_repre')); ?>:
	<?php echo GxHtml::encode($data->par_apellido_repre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_cedula_repre')); ?>:
	<?php echo GxHtml::encode($data->par_cedula_repre); ?>
	<br />
	*/ ?>

</div>