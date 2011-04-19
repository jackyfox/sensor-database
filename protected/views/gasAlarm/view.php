<?php
$this->breadcrumbs=array(
	'Gas Alarms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GasAlarm', 'url'=>array('index')),
	array('label'=>'Create GasAlarm', 'url'=>array('create')),
	array('label'=>'Update GasAlarm', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GasAlarm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GasAlarm', 'url'=>array('admin')),
);
?>

<h1>View GasAlarm #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'factory_number',
		'manufacture_date',
		'buzzer',
		'temp_sensor',
		'explosion_safety',
		'protection_corps',
		'lcd',
		'location_id',
		'gas_alarm_type_id',
		'gas_type_id',
		'control_signals_method_id',
		'supply_voltage_id',
		'gas_sensor_type_id',
		'organization_id',
	),
)); ?>