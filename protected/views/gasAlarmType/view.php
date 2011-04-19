<?php
$this->breadcrumbs=array(
	'Gas Alarm Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GasAlarmType', 'url'=>array('index')),
	array('label'=>'Create GasAlarmType', 'url'=>array('create')),
	array('label'=>'Update GasAlarmType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GasAlarmType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GasAlarmType', 'url'=>array('admin')),
);
?>

<h1>View GasAlarmType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
	),
)); ?>
