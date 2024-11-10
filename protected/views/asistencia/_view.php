<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('asi_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->asi_codigo), array('view', 'id' => $data->asi_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('ins_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->insCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cur_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->curCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('asi_fecha')); ?>:
	<?php echo GxHtml::encode($data->asi_fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('asi_asistencia')); ?>:
	<?php echo GxHtml::encode($data->asi_asistencia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('asi_observacion')); ?>:
	<?php echo GxHtml::encode($data->asi_observacion); ?>
	<br />

</div>