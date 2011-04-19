<?php
$this->breadcrumbs=array(
	'Calibrations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Calibration', 'url'=>array('index')),
	array('label'=>'Manage Calibration', 'url'=>array('admin')),
);
?>

<h1>Create Calibration</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>