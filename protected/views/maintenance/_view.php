<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(date('d.m.Y', strtotime($data->date))), array('maintenance/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gas_alarm_id')); ?>:</b>
	<?php echo CHtml::encode($data->gasAlarm->codeName); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('gasAlarm.factory_number')); ?>:</b>
	<?php echo CHtml::encode($data->gasAlarm->factory_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maintenance_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->maintenanceType->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

</div>