<?php
$this->breadcrumbs=array(
	'Газосигнализаторы'=>array('index'),
	$model->codeName.', '.$model->factory_number,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Подробно о <?php echo $model->codeName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'factory_number',
		array(
			'name' => 'manufacture_date',
			'value'=> date("d.m.Y", strtotime($model->manufacture_date)),
		),
		'organization.name',
		'location.address',
	),
)); ?>

<h2>Опробования</h2>
<?php if ($model->testCount == 0): ?>
<h4>Ни одного оробования данного датчика не проводилось</h4>
<?php else: ?>
	<?php $this->renderPartial('_tests', array(
		'tests' => $model->tests,
	)); ?>
<?php endif; ?>

<h2>Калибровки</h2>
<?php if ($model->calibrationCount == 0): ?>
<h4>Данных о калибровке данного датчика нет</h4>
<?php else: ?>
	<?php $this->renderPartial('_calibrations', array(
		'calibrations' => $model->calibrations,
	)); ?>
<?php endif; ?>