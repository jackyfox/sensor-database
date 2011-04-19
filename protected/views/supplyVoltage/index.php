<?php
$this->breadcrumbs=array(
	'Supply Voltages',
);

$this->menu=array(
	array('label'=>'Create SupplyVoltage', 'url'=>array('create')),
	array('label'=>'Manage SupplyVoltage', 'url'=>array('admin')),
);
?>

<h1>Supply Voltages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
