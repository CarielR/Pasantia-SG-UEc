<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('act_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->act_codigo), array('view', 'id' => $data->act_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('con_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->conCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('act_nombre')); ?>:
	<?php echo GxHtml::encode($data->act_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('act_fecha')); ?>:
	<?php echo GxHtml::encode($data->act_fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('act_horas_dictadas')); ?>:
	<?php echo GxHtml::encode($data->act_horas_dictadas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('act_horas_act_docente')); ?>:
	<?php echo GxHtml::encode($data->act_horas_act_docente); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('act_horas_totales_docente')); ?>:
	<?php echo GxHtml::encode($data->act_horas_totales_docente); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('act_valor_pagar')); ?>:
	<?php echo GxHtml::encode($data->act_valor_pagar); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('act_valor_total')); ?>:
	<?php echo GxHtml::encode($data->act_valor_total); ?>
	<br />
	*/ ?>

</div>