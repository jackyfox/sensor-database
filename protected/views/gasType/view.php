<?php
$this->breadcrumbs=array(
	'Gas Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GasType', 'url'=>array('index')),
	array('label'=>'Create GasType', 'url'=>array('create')),
	array('label'=>'Update GasType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GasType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GasType', 'url'=>array('admin')),
);
?>

<h1>View GasType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
	),
)); ?>
