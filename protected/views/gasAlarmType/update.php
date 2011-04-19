<?php
$this->breadcrumbs=array(
	'Gas Alarm Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GasAlarmType', 'url'=>array('index')),
	array('label'=>'Create GasAlarmType', 'url'=>array('create')),
	array('label'=>'View GasAlarmType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GasAlarmType', 'url'=>array('admin')),
);
?>

<h1>Update GasAlarmType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>