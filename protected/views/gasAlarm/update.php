<?php
$this->breadcrumbs=array(
	'Gas Alarms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GasAlarm', 'url'=>array('index')),
	array('label'=>'Create GasAlarm', 'url'=>array('create')),
	array('label'=>'View GasAlarm', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GasAlarm', 'url'=>array('admin')),
);
?>

<h1>Update GasAlarm <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>