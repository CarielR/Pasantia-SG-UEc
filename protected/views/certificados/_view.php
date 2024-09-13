<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_codigo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cer_codigo), array('view', 'id'=>$data->cer_codigo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('par_codigo')); ?>:</b>
	<?php echo CHtml::encode($data->par_codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_codigo')); ?>:</b>
	<?php echo CHtml::encode($data->cur_codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->cer_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->cer_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cer_carga_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->cer_carga_usuario); ?>
	<br />


</div>