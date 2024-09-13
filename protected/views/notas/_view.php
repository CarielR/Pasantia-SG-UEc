<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('not_codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->not_codigo), array('view', 'id' => $data->not_codigo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('cur_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->curCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ins_codigo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->insCodigo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('not_nota1')); ?>:
	<?php echo GxHtml::encode($data->not_nota1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('not_nota2')); ?>:
	<?php echo GxHtml::encode($data->not_nota2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('not_final')); ?>:
	<?php echo GxHtml::encode($data->not_final); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('not_observacion')); ?>:
	<?php echo GxHtml::encode($data->not_observacion); ?>
	<br />

</div>