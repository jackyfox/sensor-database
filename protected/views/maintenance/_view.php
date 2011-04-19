<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maintenance_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->maintenance_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gas_alarm_id')); ?>:</b>
	<?php echo CHtml::encode($data->gas_alarm_id); ?>
	<br />


</div>