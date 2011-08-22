<?php
$this->breadcrumbs=array(
	'Сервисное обслуживание',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);

/* Обновление таблицы при изменении количества строк */
Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pageSize').live('change', function() {
        $.fn.yiiGridView.update('maintenances-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY);
?>

<h1>Сервисное обслуживание</h1>

<?php /* $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view', 
)); */?>

<?php $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); ?>
<?php /* $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider, */
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maintenances-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->baseUrl . '/css/gridView/gridView.css',
	//'filter'=>$model,
	'summaryText'=>'Показано с {start} по {end} из {count}. Показывать по ' .
        CHtml::dropDownList(
            'pageSize',
            $pageSize,
            array(10=>10,20=>20,50=>50,100=>100),
            array('class'=>'change-pageSize')) .
        ' строк на страницу',
	'columns'=>array(
        array(
        	'name'=>'date',
        	'type'=>'raw',
        	'value'=>'CHtml::link(date("d.m.Y", strtotime($data->date)), array("maintenance/view", "id"=>$data->id))',
		),
		array(
			'class' => 'CLinkColumn',
			'header' => 'ГС',
			'labelExpression' => '$data->gasAlarm->codeName',
			'urlExpression' => 'Yii::app()->createUrl("gasAlarm/view",array("id"=>$data->gasAlarm->id))',
			'headerHtmlOptions' => array(
				'style' => 'width: 120px;',
				'title' => 'Перейти к ГС',
			),
		),
		array(
			'name'  => 'factory_number',
			'header'=> '№',
			'value' => '$data->gasAlarm->factory_number',
			'headerHtmlOptions' => array(
				'title' => 'Заводской номер',
			),
		),
		array(
			'name'  => 'maintenance_type_id',
			'value' => '$data->maintenanceType->type',
		),
		array(
			'name'  => 'note',
			'value' => '$data->note',
 		),
	),
)); ?>