<?php
$this->breadcrumbs=array(
	'Поверка'=>array('index'),
	'от '.date('d.m.Y', strtotime($model->date))=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список всех поверок', 'url'=>array('index')),
	array('label'=>'Подробно', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Изменить данные о поверке<br><?php echo $model->gasAlarm->codeName; ?>, заводской номер: <?php echo $model->gasAlarm->factory_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>