<?php
$this->breadcrumbs=array(
	'Сервисное обслуживание'=>array('index'),
	'Новое',
);

$this->menu=array(
	array('label'=>'Все сервисные работы', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новые данные о техобслуживании <?php echo $model->gasAlarm->codeName; ?>, <br>заводской номер: <?php echo $model->gasAlarm->factory_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>