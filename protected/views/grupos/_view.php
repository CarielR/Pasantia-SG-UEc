<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('gru_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->gru_codigo), array('view', 'id' => $data->gru_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('cur_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->curCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gru_nombre')); ?>:
	<?php echo GxHtml::encode($data->gru_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gru_horario')); ?>:
	<?php echo GxHtml::encode($data->gru_horario); ?>
	<br />

</div>