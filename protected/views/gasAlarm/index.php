<?php
$this->breadcrumbs=array(
	'Gas Alarms',
);

$this->menu=array(
	array('label'=>'Create GasAlarm', 'url'=>array('create')),
	array('label'=>'Manage GasAlarm', 'url'=>array('admin')),
);
?>

<h1>Gas Alarms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
