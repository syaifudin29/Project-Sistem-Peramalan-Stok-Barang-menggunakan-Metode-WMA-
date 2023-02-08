
	<!-- CSS only -->

<style type="text/css">
	table,
	td,
	th{
		border: 1px solid #333;
	}

	table{
		width: 100%;
		border-collapse: collapse;
	}

	th, 
	td{
		padding: 2px;
	}
	th{
		background-color: #CCC;
	}
	h4{
	    margin-top:-20px;
	}
</style>
<body>
<div style="text-align: center; margin-top: 30px;">
		<h2>CV DIJAWA ABADI “KAYULAMA” JEPARA</h2>
		<h3>Laporan Barang <?php echo $ket; ?></h3>
		<p><?php echo $tanggal; ?></p>
	</div>
	<div class="tableku" style="margin: 0 auto">
		<table class="table">
			<thead>
				<th>No</th>
				<th>Tanggal</th>
				<th>Barang</th>
				<th>Jumlah <?php echo $ket; ?></th>
				<th>Total Harga</th>
			</thead>
			<tbody>
			<?php
			$no=1;
			$jumlah = 0;
			 foreach ($barang as $key):
			 	$jumlah=$jumlah+($key['harga']*$key['jml']);
			  ?>
				<tr>
					<td style="text-align: center;"><?php echo $no++; ?></td>
					<td style="text-align: center;"><?php echo $key['tgl'] ?></td>
					<td><?php echo $key['nm_barang'] ?></td>
					<td style="text-align: center;"><?php echo $key['jml']; ?></td>
					<td><?php echo "Rp. ".number_format(($key['harga']*$key['jml']),2,',','.'); ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="4">TOTAL</td>
				<td><?php echo "Rp. ".number_format($jumlah,2,',','.'); ?></td>
			</tr>
				
			</tbody>
</table>
