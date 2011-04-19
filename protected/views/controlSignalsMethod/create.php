<?php
$this->breadcrumbs=array(
	'Control Signals Methods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ControlSignalsMethod', 'url'=>array('index')),
	array('label'=>'Manage ControlSignalsMethod', 'url'=>array('admin')),
);
?>

<h1>Create ControlSignalsMethod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>