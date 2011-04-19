<?php
$this->breadcrumbs=array(
	'Calibrations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Calibration', 'url'=>array('index')),
	array('label'=>'Create Calibration', 'url'=>array('create')),
	array('label'=>'View Calibration', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Calibration', 'url'=>array('admin')),
);
?>

<h1>Update Calibration <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>