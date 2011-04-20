<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperature')); ?>:</b>
	<?php echo CHtml::encode($data->temperature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('humidity')); ?>:</b>
	<?php echo CHtml::encode($data->humidity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs1')); ?>:</b>
	<?php echo CHtml::encode($data->pgs1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs1_voltage')); ?>:</b>
	<?php echo CHtml::encode($data->pgs1_voltage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs1_indication')); ?>:</b>
	<?php echo CHtml::encode($data->pgs1_indication); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs2')); ?>:</b>
	<?php echo CHtml::encode($data->pgs2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs2_voltage')); ?>:</b>
	<?php echo CHtml::encode($data->pgs2_voltage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs2_indication')); ?>:</b>
	<?php echo CHtml::encode($data->pgs2_indication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs3')); ?>:</b>
	<?php echo CHtml::encode($data->pgs3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs3_voltage')); ?>:</b>
	<?php echo CHtml::encode($data->pgs3_voltage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pgs3_indication')); ?>:</b>
	<?php echo CHtml::encode($data->pgs3_indication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gas_alarm_id')); ?>:</b>
	<?php echo CHtml::encode($data->gas_alarm_id); ?>
	<br />

	*/ ?>

</div>