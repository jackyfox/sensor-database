<?php
$this->breadcrumbs=array(
	'Maintenance Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MaintenanceType', 'url'=>array('index')),
	array('label'=>'Create MaintenanceType', 'url'=>array('create')),
	array('label'=>'Update MaintenanceType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MaintenanceType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaintenanceType', 'url'=>array('admin')),
);
?>

<h1>View MaintenanceType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
	),
)); ?>
