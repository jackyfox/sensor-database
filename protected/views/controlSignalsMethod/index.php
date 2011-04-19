<?php
$this->breadcrumbs=array(
	'Control Signals Methods',
);

$this->menu=array(
	array('label'=>'Create ControlSignalsMethod', 'url'=>array('create')),
	array('label'=>'Manage ControlSignalsMethod', 'url'=>array('admin')),
);
?>

<h1>Control Signals Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
