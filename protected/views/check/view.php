<?php
$this->breadcrumbs=array(
    'Поверка'=>array('index'),
    'от '.date('d.m.Y', strtotime($model->date)),
);

$this->menu=array(
    array('label'=>'Список всех поверок', 'url'=>array('index')),
    array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Удалить', 
          'url'=>'#', 
          'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
                               'params'=>array('returnUrl'=>$this->createUrl('gasAlarm/view', array('id'=>$model->gasAlarm->id))),
                               'confirm'=>'Точно удалить?')),
    array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Поверка <?php echo $model->gasAlarm->codeName; ?>, <br>заводской номер: <?php echo $model->gasAlarm->factory_number; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array(
            'name'=>'date',
            'value'=>date('d.m.Y', strtotime($model->date))
        ),
        array(
            'name'=>'check_result_id',
            'value'=>$model->checkResult,
        ),
    ),
)); ?>

<p><?php echo CHtml::link('Перейти к ГС', array('gasAlarm/view', 'id'=>$model->gasAlarm->id))?></p>
