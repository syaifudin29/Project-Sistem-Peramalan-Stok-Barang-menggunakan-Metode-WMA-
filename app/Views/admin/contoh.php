<?php 

	$bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
	echo $bulan[3]; 
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1">
	<thead>
		<th>Bulan</th>
		<th>WMA 3</th>
		<th>WMA 4</th>
		<th>WMA 5</th>
		<th>WMA 6</th>
		<th>ERROR 3</th>
		<th>ERROR 4</th>
		<th>ERROR 5</th>
		<th>ERROR 6</th>
	</thead>
	<tbody>
		<?php
		foreach ($hasil as $key): 
			if($key['bulan'] == date('Y-m-d', strtotime($tanggal))){
				$bln = intval(date('m', strtotime($tanggal)));
			}else{ ?>
			<tr>
				<td><?php echo date('M-Y', strtotime($key['bulan'])); ?></td>
				<td><?php echo $key['wma3']; ?></td>
				<td><?php echo $key['wma4']; ?></td>
				<td><?php echo $key['wma5']; ?></td>
				<td><?php echo $key['wma6']; ?></td>
				<td><?php echo $key['error3']; ?></td>
				<td><?php echo $key['error4']; ?></td>
				<td><?php echo $key['error5']; ?></td>
				<td><?php echo $key['error6']; ?></td>
			</tr>	
		<?php } endforeach ?>
		<tr>
			<td colspan="5">MAPE</td>
			<?php foreach ($mape as $keyMape): ?>	
			<td><?php echo $keyMape; ?></td>
			<?php endforeach ?>
		</tr>	
	</tbody>
</table>
<p>Nilai Error terendah : <?php echo $wma['error']; ?></p>
<p>Nilai Prediksi Bulan <?php echo $bulan[$bln]; ?> adalah : <?php echo $wma['nilai']; ?> </p>

</body>
</html>