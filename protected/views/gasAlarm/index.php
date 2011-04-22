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
			'class' => 'CLinkColumn',
			'header' => 'Наименование',
			'labelExpression' => '$data->codeName',
			'urlExpression' => 'Yii::app()->createUrl("gasAlarm/view",array("id"=>$data->id))',
			'headerHtmlOptions' => array(
				'style' => 'width: 120px;'
			),
		),
		array(
			'name'  => 'factory_number',
			'header'=> 'Зав .№',
			'value' => '$data->factory_number',
			'headerHtmlOptions' => array(
				'title' => 'Заводской номер',
			),
		),
		array(
			'name'  => 'gas_type_id',
			'header'=> 'Газ',
			'value' => '$data->gasType->type',
		),
		array(
			'name'  => 'organization',
			'header'=> 'Организация',
			'value' => '$data->organization->name',
 		),
 		array(
			'name'  => 'location',
 			'header'=> 'Размещение',
			'value' => '$data->location->address',
 		),
 		array(
 			'name'  => 'manufacture_date',
 			'value' => 'date("d.m.Y", strtotime($data->manufacture_date))', 
 			'headerHtmlOptions' => array(
				'style' => 'width: 60px;'
			),
 		),
	),
)); ?>