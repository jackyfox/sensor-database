<?php
$this->breadcrumbs=array(
	'Checks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Check', 'url'=>array('index')),
	array('label'=>'Create Check', 'url'=>array('create')),
	array('label'=>'View Check', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Check', 'url'=>array('admin')),
);
?>

<h1>Update Check <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>