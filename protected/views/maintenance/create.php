<?php
$this->breadcrumbs=array(
	'Maintenances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Maintenance', 'url'=>array('index')),
	array('label'=>'Manage Maintenance', 'url'=>array('admin')),
);
?>

<h1>Create Maintenance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>