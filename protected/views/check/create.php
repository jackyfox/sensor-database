<?php
$this->breadcrumbs=array(
	'Поверка'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список всех поверок', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новые данные о поверке <?php echo $model->gasAlarm->codeName; ?>, <br>заводской номер: <?php echo $model->gasAlarm->factory_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>