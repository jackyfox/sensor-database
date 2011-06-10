<?php
$this->breadcrumbs=array(
	'Организации'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список организаций', 'url'=>array('index')),
	array('label'=>'Добавить организацию', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript(
   'hideFlash',
   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>

<h1><?php echo $model->name; ?></h1>

<h3>ИНН: <?php echo $model->inn; ?></h3>


<div id="locations">
    <?php if($model->locCount >= 1): ?>
        <h3>Адреса размещения</h3>
 
        <?php $this->renderPartial('_locations', array(
            'organization'=>$model,
            'locations'=>$model->locations,
        )); ?>
    <?php else: ?>
    	<h3>У данной организации пока не добавлено ни одного адреса</h3>
    <?php endif; ?>
    <?php if(Yii::app()->user->hasFlash('success')):?>
	    <div class="flash-success">
	        <?php echo Yii::app()->user->getFlash('success'); ?>
	    </div>
	<?php endif; ?>
    <p><?php echo CHtml::link("Добавить новый адрес...", array(
    			'location/create',
    			'org_id'=>$model->id,
    		)); ?></p>
</div>