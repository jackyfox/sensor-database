<div id="maintenances_table">
<table>
<tr>
<th>Дата</th><th>Вид работ</th><th>Заметки</th>
</tr>
<?php foreach ($maintenances as $maintenance): ?>
<tr>
<td><?php echo CHtml::link(date("d.m.Y", strtotime($maintenance->date)), 
	array('maintenance/view',
    'id'=>$maintenance->id)); ?></td>
<td><?php echo $maintenance->maintenanceType->type; ?></td>
<td><?php echo $maintenance->note; ?></td>

</tr>
<?php endforeach; ?>
</table>
</div><!-- maintenances_table -->