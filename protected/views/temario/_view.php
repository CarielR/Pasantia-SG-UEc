<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('tem_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->tem_codigo), array('view', 'id' => $data->tem_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pla_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->plaCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->docCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tem_nombre')); ?>:
	<?php echo GxHtml::encode($data->tem_nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tem_fecha_inicio')); ?>:
	<?php echo GxHtml::encode($data->tem_fecha_inicio); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tem_fecha_fin')); ?>:
	<?php echo GxHtml::encode($data->tem_fecha_fin); ?>
	<br />
        <?php echo GxHtml::encode($data->getAttributeLabel('tem_valor_clases')); ?>:
	<?php echo GxHtml::encode($data->tem_valor_clases); ?>
	<br />
        
</div>