<?php
$this->breadcrumbs=array(
	'Maintenance Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MaintenanceType', 'url'=>array('index')),
	array('label'=>'Create MaintenanceType', 'url'=>array('create')),
	array('label'=>'View MaintenanceType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MaintenanceType', 'url'=>array('admin')),
);
?>

<h1>Update MaintenanceType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>