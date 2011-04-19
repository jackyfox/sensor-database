<?php
$this->breadcrumbs=array(
	'Gas Alarm Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GasAlarmType', 'url'=>array('index')),
	array('label'=>'Manage GasAlarmType', 'url'=>array('admin')),
);
?>

<h1>Create GasAlarmType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>