<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factory_number')); ?>:</b>
	<?php echo CHtml::encode($data->factory_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacture_date')); ?>:</b>
	<?php echo CHtml::encode($data->manufacture_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buzzer')); ?>:</b>
	<?php echo CHtml::encode($data->buzzer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_sensor')); ?>:</b>
	<?php echo CHtml::encode($data->temp_sensor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('explosion_safety')); ?>:</b>
	<?php echo CHtml::encode($data->explosion_safety); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('protection_corps')); ?>:</b>
	<?php echo CHtml::encode($data->protection_corps); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lcd')); ?>:</b>
	<?php echo CHtml::encode($data->lcd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::encode($data->location_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gas_alarm_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->gas_alarm_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gas_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->gas_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('control_signals_method_id')); ?>:</b>
	<?php echo CHtml::encode($data->control_signals_method_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supply_voltage_id')); ?>:</b>
	<?php echo CHtml::encode($data->supply_voltage_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gas_sensor_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->gas_sensor_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->organization_id); ?>
	<br />

	*/ ?>

</div>