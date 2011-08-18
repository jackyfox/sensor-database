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
	'cssFile' => Yii::app()->baseUrl . '/css/gridView/gridView.css',
	'columns'=>array(
		array(
			'name'=>'name',
        	'type'=>'raw',
        	'value'=>'CHtml::link($data->name, array("organization/view", "id"=>$data->id))',
		),
		array(
			'name'  => 'inn',
			'header'=> 'ИНН',
			'value' => '$data->inn',
		),
	),
)); ?>
