<div id="locations_table" class="detail_list">
<ul>
<?php foreach ($locations as $location): ?>

<li><?php echo CHtml::link($location->address, array(
		'location/update',
    	'id'=>$location->id,
	), array(
		'title'=>'Править адрес',
	)); ?></li>
<?php endforeach; ?>
</ul>
</div><!-- locations_table -->