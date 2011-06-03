<?php
$this->breadcrumbs=array(
	'Организации',
);

$this->menu=array(
	array('label'=>'Добавить организацию', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Организации</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
