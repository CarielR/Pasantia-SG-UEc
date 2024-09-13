<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('con_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->con_codigo), array('view', 'id' => $data->con_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('tem_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->temCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('con_nombre')); ?>:
	<?php echo GxHtml::encode($data->con_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('con_horas_planificadas')); ?>:
	<?php echo GxHtml::encode($data->con_horas_planificadas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('con_horas_act_planificadas')); ?>:
	<?php echo GxHtml::encode($data->con_horas_act_planificadas); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('con_horas_totales_docente')); ?>:
	<?php echo GxHtml::encode($data->con_horas_totales_docente); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('con_valor_pagar')); ?>:
	<?php echo GxHtml::encode($data->con_valor_pagar); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('con_valor_total')); ?>:
	<?php echo GxHtml::encode($data->con_valor_total); ?>
	<br />
	*/ ?>

</div>