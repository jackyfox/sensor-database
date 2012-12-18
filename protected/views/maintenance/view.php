<?php
$this->breadcrumbs=array(
	'Ремонт'=>array('index'),
	'от '.date('d.m.Y', strtotime($model->date)),
);

$this->menu=array(
	array('label'=>'Все ремонтные работы', 'url'=>array('index')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 
		  'url'=>'#', 
		  'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
							   'params'=>array('returnUrl'=>$this->createUrl('gasAlarm/view', array('id'=>$model->gasAlarm->id))),
							   'confirm'=>'Точно удалить?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Сервисное обслуживание <?php echo $model->gasAlarm->codeName; ?>, <br>заводской номер: <?php echo $model->gasAlarm->factory_number; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'date',
			'value'=>date('d.m.Y', strtotime($model->date))
		),
		'note',
		'maintenanceType.type',
	),
)); ?>

<p><?php echo CHtml::link('Перейти к ГС', array('gasAlarm/view', 'id'=>$model->gasAlarm->id))?></p>