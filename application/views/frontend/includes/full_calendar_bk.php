<h4>Tution (Day/Timings )</h4>
<?php
$weekdays =array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
?>

<table class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<td></td>
			<td>DAY/TIME</td>
			<td>0:01 - 1 - 00</td>
			<td>1:00 - 2 - 00</td>
			<td>2:00 - 3 - 00</td>
			<td>3:00 - 4 - 00</td>
			<td>4:00 - 5 - 00</td>
			<td>5:00 - 6 - 00</td>
			<td>6:00 - 7 - 00</td>
			<td>7:00 - 8 - 00</td>
			<td>8:00 - 9 - 00</td>
			<td>9:00 - 10 - 00</td>
			<td>10:00 - 11 - 00</td>
			<td>11:00 - 12 - 00</td>
		</tr>
		<?php for($i=0;$i<=6;$i++){?>
			<tr>
				<td><input type="checkbox" name=""></td>
				<td><?php echo $weekdays[$i];?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		<?php }?>
	</table>
</table>