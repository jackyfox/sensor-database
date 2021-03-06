<?php
$this->breadcrumbs=array(
    'Поверка',
);

$this->menu=array(
    array('label'=>'Управление', 'url'=>array('admin')),
);

/* Обновление таблицы при изменении количества строк */
Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pageSize').live('change', function() {
        $.fn.yiiGridView.update('checks-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY);
?>

<div>
<?php
if ($reqDate = Yii::app()->request->getQuery('Check'))
{
    $formDate = date("d.m.Y", strtotime($reqDate['date']));;
    echo "<h1>Поверка от $formDate</h1>";
    echo '&laquo; <a href="'.$this->createUrl("check/index").'" title="К списку всех поверок">Назад</a> — ';
    echo '<a href="'.$this->createUrl("check/print", array("Check[date]"=>$reqDate['date'])).'">Сохранить в DOC-файл</a>';
}
else
    echo "<h1>Поверка</h1>";
?>
</div>

<?php $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); ?>
<?php /* $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider, */
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'checks-grid',
    'dataProvider'=>$model->search(),
    'cssFile' => Yii::app()->baseUrl . '/css/gridView/gridView.css',
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
            'value'=>'CHtml::link(date("d.m.Y", strtotime($data->date)), 
                array("check/index", "Check[date]"=>$data->date))',
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'ГС',
            'labelExpression' => '$data->gasAlarm->codeName',
            'urlExpression' => 'Yii::app()->createUrl("gasAlarm/view",array("id"=>$data->gasAlarm->id))',
            'headerHtmlOptions' => array(
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
            'header'=> 'Адрес',
            'value' => '$data->gasAlarm->location->address',
        ),
    ),
)); ?>