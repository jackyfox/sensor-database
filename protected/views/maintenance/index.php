<?php
$this->breadcrumbs=array(
	'Maintenances',
);

$this->menu=array(
	array('label'=>'Create Maintenance', 'url'=>array('create')),
	array('label'=>'Manage Maintenance', 'url'=>array('admin')),
);
?>

<h1>Maintenances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
