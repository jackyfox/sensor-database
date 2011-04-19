<?php
$this->breadcrumbs=array(
	'Calibrations',
);

$this->menu=array(
	array('label'=>'Create Calibration', 'url'=>array('create')),
	array('label'=>'Manage Calibration', 'url'=>array('admin')),
);
?>

<h1>Calibrations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
