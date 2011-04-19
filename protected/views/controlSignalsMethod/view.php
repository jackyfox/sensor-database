<?php
$this->breadcrumbs=array(
	'Control Signals Methods'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ControlSignalsMethod', 'url'=>array('index')),
	array('label'=>'Create ControlSignalsMethod', 'url'=>array('create')),
	array('label'=>'Update ControlSignalsMethod', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ControlSignalsMethod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ControlSignalsMethod', 'url'=>array('admin')),
);
?>

<h1>View ControlSignalsMethod #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'desc',
	),
)); ?>
