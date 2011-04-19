<?php
$this->breadcrumbs=array(
	'Gas Alarm Types',
);

$this->menu=array(
	array('label'=>'Create GasAlarmType', 'url'=>array('create')),
	array('label'=>'Manage GasAlarmType', 'url'=>array('admin')),
);
?>

<h1>Gas Alarm Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
