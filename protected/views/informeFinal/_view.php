<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('inf_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->inf_codigo), array('view', 'id' => $data->inf_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('cur_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->curCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tem_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->temCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->docCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_nombre')); ?>:
	<?php echo GxHtml::encode($data->inf_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_fecha_entrega')); ?>:
	<?php echo GxHtml::encode($data->inf_fecha_entrega); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_num_asistentes')); ?>:
	<?php echo GxHtml::encode($data->inf_num_asistentes); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_num_inscritos')); ?>:
	<?php echo GxHtml::encode($data->inf_num_inscritos); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_num_retirados')); ?>:
	<?php echo GxHtml::encode($data->inf_num_retirados); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_num_aprobados')); ?>:
	<?php echo GxHtml::encode($data->inf_num_aprobados); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_promedio_asistencia')); ?>:
	<?php echo GxHtml::encode($data->inf_promedio_asistencia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_promedio_calificacion')); ?>:
	<?php echo GxHtml::encode($data->inf_promedio_calificacion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_desarrollo')); ?>:
	<?php echo GxHtml::encode($data->inf_desarrollo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_logros')); ?>:
	<?php echo GxHtml::encode($data->inf_logros); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_conclusiones')); ?>:
	<?php echo GxHtml::encode($data->inf_conclusiones); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('inf_recomendaciones')); ?>:
	<?php echo GxHtml::encode($data->inf_recomendaciones); ?>
	<br />
	*/ ?>

</div>