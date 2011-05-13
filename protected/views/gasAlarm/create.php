<?php
$this->breadcrumbs=array(
	'Газосигнализаторы'=>array('index'),
	'Новый',
);

$this->menu=array(
	array('label'=>'Список ГС', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить газосигнализатор</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>