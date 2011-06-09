<?php
$this->breadcrumbs=array(
	'Организации'=>array('index'),
	'Новая',
);

$this->menu=array(
	array('label'=>'Список организаций', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить организацию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>