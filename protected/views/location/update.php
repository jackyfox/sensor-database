<?php
$this->breadcrumbs=array(
	'Адреса'=>array('index'),
	$model->address=>array('view','id'=>$model->id),
	'Правка',
);

$this->menu=array(
	array('label'=>'Упраление', 'url'=>array('admin')),
);
?>

<h1>Изменить адрес <?php echo $model->address; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>