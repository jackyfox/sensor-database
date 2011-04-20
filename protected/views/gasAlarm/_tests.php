<?php foreach ($tests as $test): ?>
<div class="test">
	<div class="date">Дата: <?php echo date("d.m.Y", strtotime($test->date)); ?></div>
	<div class="temp">Температура: <?php echo $test->temperature; ?></div>
	<div class="humi">Влажность: <?php echo $test->humidity; ?></div>
</div><!-- test -->
<?php endforeach; ?>