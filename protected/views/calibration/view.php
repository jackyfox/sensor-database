<?php
$this->breadcrumbs=array(
	'Calibrations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Calibration', 'url'=>array('index')),
	array('label'=>'Create Calibration', 'url'=>array('create')),
	array('label'=>'Update Calibration', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Calibration', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Calibration', 'url'=>array('admin')),
);
?>

<h1>View Calibration #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'temperature',
		'humidity',
		'pgs1',
		'pgs1_voltage',
		'pgs2',
		'pgs2_voltage',
		'pgs3',
		'pgs3_voltage',
		'gas_alarm_id',
	),
)); ?>
