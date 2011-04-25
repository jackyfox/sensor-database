<div id="calibrations_table" class="detail_table">
<table>
<tr>
<th>Дата</th><th>Темп., &deg;С</th><th>Влажность</th>
<th>ПГС&nbsp;1</th><th>ПГС&nbsp;1 (напр)</th>
<?php if ($calibrations[0]->gasAlarm->gas_type_id == 2):?>
<th>ПГС&nbsp;2</th><th>ПГС&nbsp;2 (напр)</th>
<?php endif; ?>
<th>ПГС&nbsp;3</th><th>ПГС&nbsp;3 (напр)</th>
</tr>
<?php foreach ($calibrations as $calibration): ?>
<tr>
<td><?php echo CHtml::link(date("d.m.Y", strtotime($calibration->date)), 
	array('calibration/view',
    'id'=>$calibration->id)); ?></td>
<td><?php echo $calibration->temperature; ?></td>
<td><?php echo $calibration->humidity; ?></td>

<td><?php echo floatval($calibration->pgs1); ?></td>
<td><?php echo floatval($calibration->pgs1_voltage); ?></td>

<?php if ($calibrations[0]->gasAlarm->gas_type_id == 2):?>
<td><?php echo floatval($calibration->pgs2); ?></td>
<td><?php echo floatval($calibration->pgs2_voltage); ?></td>
<?php endif; ?>

<td><?php echo floatval($calibration->pgs3); ?></td>
<td><?php echo floatval($calibration->pgs3_voltage); ?></td>
</tr>
<?php endforeach; ?>
</table>
</div><!-- calibrations_table -->