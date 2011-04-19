<?php
$this->breadcrumbs=array(
	'Supply Voltages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SupplyVoltage', 'url'=>array('index')),
	array('label'=>'Manage SupplyVoltage', 'url'=>array('admin')),
);
?>

<h1>Create SupplyVoltage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>