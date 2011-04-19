<?php
$this->breadcrumbs=array(
	'Gas Types',
);

$this->menu=array(
	array('label'=>'Create GasType', 'url'=>array('create')),
	array('label'=>'Manage GasType', 'url'=>array('admin')),
);
?>

<h1>Gas Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
