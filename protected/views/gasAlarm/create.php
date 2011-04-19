<?php
$this->breadcrumbs=array(
	'Gas Alarms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GasAlarm', 'url'=>array('index')),
	array('label'=>'Manage GasAlarm', 'url'=>array('admin')),
);
?>

<h1>Create GasAlarm</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>