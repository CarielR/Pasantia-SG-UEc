<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('ins_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->ins_codigo), array('view', 'id' => $data->ins_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('cur_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->curCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ein_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->einCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('par_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->parCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gru_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->gruCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_fecha_inscripcion')); ?>:
	<?php echo GxHtml::encode($data->ins_fecha_inscripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_factura_pago')); ?>:
	<?php echo GxHtml::encode($data->ins_factura_pago); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_pago_inscripcion')); ?>:
	<?php echo GxHtml::encode($data->ins_pago_inscripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_fecha_pago_inscripcion')); ?>:
	<?php echo GxHtml::encode($data->ins_fecha_pago_inscripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_pago_auditoria')); ?>:
	<?php echo GxHtml::encode($data->ins_pago_auditoria); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_pago_valor')); ?>:
	<?php echo GxHtml::encode($data->ins_pago_valor); ?>
	<br />
	*/ ?>

</div>