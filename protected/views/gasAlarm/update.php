<?php
$this->breadcrumbs=array(
	'Газосигнализатор'=>array('index'),
	$model->codeName.', '.$model->factory_number=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Подробно', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Изменить газосигнализатор <?php echo $model->codeName.', '.$model->factory_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>