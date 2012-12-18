<?php
$this->breadcrumbs=array(
	'Газосигнализаторы'=>array('index'),
	$model->codeName.', '.$model->factory_number,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Точно удалить?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript(
		'hideFlash',
		'$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		CClientScript::POS_READY
);
?>

<h1>Подробно о <?php echo $model->codeName; ?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'factory_number',
		array(
			'name' => 'manufacture_date',
			'value'=> date("d.m.Y", strtotime($model->manufacture_date)),
		),
		array(
			'name' => 'organization.name',
			'label'=> 'Организация',
			'type' => 'raw',
			'value'=> CHtml::link($model->organization->name, array('organization/view', 'id'=>$model->organization_id)),
		),
		
		'location.address',
	),
)); ?>
<!-- 
<h2>Опробования</h2>
<?php if ($model->testCount == 0): ?>
<h4>Ни одного оробования данного датчика не проводилось</h4>
<?php else: ?>
	<?php $this->renderPartial('_tests', array(
		'tests' => $model->tests,
	)); ?>
<?php endif; ?>

<h2>Калибровки</h2>
<?php if ($model->calibrationCount == 0): ?>
<h4>Данных о калибровке данного датчика нет</h4>
<?php else: ?>
	<?php $this->renderPartial('_calibrations', array(
		'calibrations' => $model->calibrations,
	)); ?>
<?php endif; ?>
 -->
<h2>Ремонт</h2>
<?php if ($model->maintenanceCount == 0): ?>
<h4>Сервисные обслуживания не проводились для данного датчика</h4>
<?php else: ?>
	<?php $this->renderPartial('_maintenances', array(
		'maintenances' => $model->maintenances,
	)); ?>
<?php endif; ?>
<span class="add-new-data"><?php echo CHtml::link("Добавить данные о новом сервисном обслуживании...", array(
    			'maintenance/create',
    			'ga_id'=>$model->id,
    		)); ?></span>
    		
<h2>Поверка</h2>
<?php if ($model->checkCount == 0): ?>
<h4>Данный датчик до сих пор не поверен</h4>
<?php else: ?>
	<?php $this->renderPartial('_checks', array(
		'checks' => $model->checks,
	)); ?>
<?php endif; ?>
<span class="add-new-data"><?php echo CHtml::link("Добавить данные о новой поверке...", array(
    			'check/create',
    			'ga_id'=>$model->id,
    		)); ?></span>