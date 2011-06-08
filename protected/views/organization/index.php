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

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'class' => 'CLinkColumn',
			'header' => 'Название',
			'labelExpression' => '$data->name',
			'urlExpression' => 'Yii::app()->createUrl("organization/view",array("id"=>$data->id))',
		),
		array(
			'name'  => 'inn',
			'header'=> 'ИНН',
			'value' => '$data->inn',
		),
	),
)); ?>
