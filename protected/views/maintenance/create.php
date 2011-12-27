<?php
$this->breadcrumbs=array(
	'Ремонт'=>array('index'),
	'Новый',
);

$this->menu=array(
	array('label'=>'Все ремонтные работы', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новые данные о ремонте <?php echo $model->gasAlarm->codeName; ?>, <br>заводской номер: <?php echo $model->gasAlarm->factory_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>