<?php
$this->breadcrumbs=array(
	'Maintenance Types',
);

$this->menu=array(
	array('label'=>'Create MaintenanceType', 'url'=>array('create')),
	array('label'=>'Manage MaintenanceType', 'url'=>array('admin')),
);
?>

<h1>Maintenance Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
