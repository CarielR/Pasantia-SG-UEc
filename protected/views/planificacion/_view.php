<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('pla_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->pla_codigo), array('view', 'id' => $data->pla_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('tca_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tcaCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tev_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tevCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_programa')); ?>:
	<?php echo GxHtml::encode($data->pla_programa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_nombre')); ?>:
	<?php echo GxHtml::encode($data->pla_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_fecha_inicio')); ?>:
	<?php echo GxHtml::encode($data->pla_fecha_inicio); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_fecha_fin')); ?>:
	<?php echo GxHtml::encode($data->pla_fecha_fin); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_lugar')); ?>:
	<?php echo GxHtml::encode($data->pla_lugar); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_curso_codigo')); ?>:
	<?php echo GxHtml::encode($data->pla_curso_codigo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_antecedentes')); ?>:
	<?php echo GxHtml::encode($data->pla_antecedentes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_objetivo')); ?>:
	<?php echo GxHtml::encode($data->pla_objetivo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_metodologia')); ?>:
	<?php echo GxHtml::encode($data->pla_metodologia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_presupuesto')); ?>:
	<?php echo GxHtml::encode($data->pla_presupuesto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_disposiciones')); ?>:
	<?php echo GxHtml::encode($data->pla_disposiciones); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_firma_supervisado')); ?>:
	<?php echo GxHtml::encode($data->pla_firma_supervisado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_pie_supervisado')); ?>:
	<?php echo GxHtml::encode($data->pla_pie_supervisado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_fecha')); ?>:
	<?php echo GxHtml::encode($data->pla_fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_creado_por')); ?>:
	<?php echo GxHtml::encode($data->pla_creado_por); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_fecha_creacion')); ?>:
	<?php echo GxHtml::encode($data->pla_fecha_creacion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_modificado_por')); ?>:
	<?php echo GxHtml::encode($data->pla_modificado_por); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pla_fecha_modificacion')); ?>:
	<?php echo GxHtml::encode($data->pla_fecha_modificacion); ?>
	<br />
	*/ ?>

</div>