<?php
$this->breadcrumbs=array(
	'Gas Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GasType', 'url'=>array('index')),
	array('label'=>'Manage GasType', 'url'=>array('admin')),
);
?>

<h1>Create GasType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>