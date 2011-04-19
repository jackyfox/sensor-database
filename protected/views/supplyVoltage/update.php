<?php
$this->breadcrumbs=array(
	'Supply Voltages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SupplyVoltage', 'url'=>array('index')),
	array('label'=>'Create SupplyVoltage', 'url'=>array('create')),
	array('label'=>'View SupplyVoltage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SupplyVoltage', 'url'=>array('admin')),
);
?>

<h1>Update SupplyVoltage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>