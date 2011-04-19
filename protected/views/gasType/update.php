<?php
$this->breadcrumbs=array(
	'Gas Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GasType', 'url'=>array('index')),
	array('label'=>'Create GasType', 'url'=>array('create')),
	array('label'=>'View GasType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GasType', 'url'=>array('admin')),
);
?>

<h1>Update GasType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>