<?php 
	$dates = array();
	$v1 = array();
	$v2 = array();
	$v3 = array();
?>
<?php foreach ($tests as $test): ?>
<?php 
	$dates[] = date("d.m.Y", strtotime($test->date));
	$v1[] = floatval($test->pgs1_voltage);
	$v2[] = floatval($test->pgs2_voltage);
	$v3[] = floatval($test->pgs3_voltage);
?>
<div class="test">
	<div class="date">Дата: <?php echo date("d.m.Y", strtotime($test->date)); ?></div>
	<div class="temp">Температура: <?php echo $test->temperature; ?></div>
	<div class="humi">Влажность: <?php echo $test->humidity; ?></div>
</div><!-- test --><br />
<?php endforeach; ?>