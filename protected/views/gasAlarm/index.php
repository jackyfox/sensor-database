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

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'class'=>'CLinkColumn',
			'header'=>'Зав. №',
			'labelExpression'=>'$data->factory_number',
			'urlExpression'=>'Yii::app()->createUrl("gasAlarm/view",array("id"=>$data->id))'
		),
		array(
			'name'  => 'gas_type_id',
			'value' => '$data->gasType->type',
		),
		array(
			'name'  => 'organization',
			'value' => '$data->organization->name',
 		),
 		array(
			'name'  => 'location',
			'value' => '$data->location->address',
 		),
 		array(
 			'name'  => 'manufacture_date',
 			'value' => 'date("d.m.Y", strtotime($data->manufacture_date))', 
 		),
	),
)); ?>