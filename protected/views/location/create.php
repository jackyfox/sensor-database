<?php
$this->breadcrumbs=array(
	'Адреса'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список адресов', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавление адреса</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>