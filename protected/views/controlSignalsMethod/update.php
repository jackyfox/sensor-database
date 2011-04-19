<?php
$this->breadcrumbs=array(
	'Control Signals Methods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ControlSignalsMethod', 'url'=>array('index')),
	array('label'=>'Create ControlSignalsMethod', 'url'=>array('create')),
	array('label'=>'View ControlSignalsMethod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ControlSignalsMethod', 'url'=>array('admin')),
);
?>

<h1>Update ControlSignalsMethod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>