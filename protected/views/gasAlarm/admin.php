<?php
$this->breadcrumbs=array(
	'Gas Alarms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GasAlarm', 'url'=>array('index')),
	array('label'=>'Create GasAlarm', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gas-alarm-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gas Alarms</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gas-alarm-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'factory_number',
		'manufacture_date',
		'buzzer',
		'temp_sensor',
		'explosion_safety',
		/*
		'protection_corps',
		'lcd',
		'location_id',
		'gas_alarm_type_id',
		'gas_type_id',
		'control_signals_method_id',
		'supply_voltage_id',
		'gas_sensor_type_id',
		'organization_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
