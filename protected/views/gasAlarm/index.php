<?php
$this->breadcrumbs=array(
	'Газосигнализаторы',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gas-alarm-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript(
   'hideFlash',
   '$(".flash-success").animate({opacity: 1.0}, 10000).fadeOut("slow");',
   CClientScript::POS_READY
);

/* Обновление таблицы при изменении количества строк */
Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pageSize').live('change', function() {
        $.fn.yiiGridView.update('gas-alarm-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY);
?>

<h1>Газосигнализаторы</h1>

<?php echo CHtml::link('Поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<p>
В поисковом запросе можно использовать знаки сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>). Например, чтобы найти все ГС с номером больше 900 введите «&gt;900»
</p>
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php if(Yii::app()->user->hasFlash('success')):?>
	<p></p>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); ?>
<?php /* $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider, */
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gas-alarm-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->baseUrl . '/css/gridView/gridView.css',
	'summaryText'=>'Показано с {start} по {end} из {count} ГС. Показывать по ' .
        CHtml::dropDownList(
            'pageSize',
            $pageSize,
            array(10=>10,20=>20,50=>50,100=>100),
            array('class'=>'change-pageSize')) .
        ' ГС на страницу',
	'columns'=>array(
		array(
			'class' => 'CLinkColumn',
			'header' => 'Наименование',
			'labelExpression' => '$data->codeName',
			'urlExpression' => 'Yii::app()->createUrl("gasAlarm/view",array("id"=>$data->id))',
			'headerHtmlOptions' => array(
				'style' => 'width: 120px;'
			),
		),
		array(
			'name'  => 'factory_number',
			'header'=> '№',
			'value' => '$data->factory_number',
			'headerHtmlOptions' => array(
				'title' => 'Заводской номер',
			),
		),
		array(
			'name'  => 'gas_type_id',
			'header'=> 'Газ',
			'value' => '$data->gasType->type',
		),
		array(
			'name'  => 'organization_id',
			'header'=> 'Организация',
			'value' => '$data->organization->name',
 		),
 		array(
			'name'  => 'location_id',
 			'header'=> 'Размещение',
			'value' => '$data->location->address',
 		),
 		array(
 			'name'  => 'manufacture_date',
 			'value' => 'date("d.m.Y", strtotime($data->manufacture_date))', 
 			'headerHtmlOptions' => array(
				'style' => 'width: 60px;'
			),
 		),
 		array(
 			'name'  => 'lastSensorChange',
 			'value' => '$data->lastSensorChange', 
 			'headerHtmlOptions' => array(
				'style' => 'width: 60px;'
			),
 		),
	),
)); ?>
