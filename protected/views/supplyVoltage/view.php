<?php
$this->breadcrumbs=array(
	'Supply Voltages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SupplyVoltage', 'url'=>array('index')),
	array('label'=>'Create SupplyVoltage', 'url'=>array('create')),
	array('label'=>'Update SupplyVoltage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SupplyVoltage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SupplyVoltage', 'url'=>array('admin')),
);
?>

<h1>View SupplyVoltage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'voltage',
	),
)); ?>
