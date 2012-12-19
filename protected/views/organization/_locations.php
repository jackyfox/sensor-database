<div id="locations_table" class="detail_list">
<ul>
<?php foreach ($locations as $location): ?>

<li><?php echo CHtml::link($location->address, array(
		'location/update',
    	'id'=>$location->id,
	), array(
		'title'=>'Править адрес',
	)); ?>, (<?php if($location->gaCount) echo CHtml::link(
			$location->gaCount, 
			$this->createUrl("gasAlarm/index", array('GasAlarm[location_id]'=>$location->id))); 
				   else echo "По этому адресу нет ни одного газосигнализатора"; ?>)</li>
<?php endforeach; ?>
</ul>
</div><!-- locations_table -->