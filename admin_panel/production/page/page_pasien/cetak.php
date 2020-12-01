<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Rekapitulasi Data Monitoring Penyebaran Covid-19</title>
</head>
<body>

	<center>

		<h2>Rekapitulasi Data</h2>
		<h4>Monitoring Penyebaran Covid-19</h4>

	</center>

	<?php 
	include '../../../config/koneksi.php';
	?>

	<table border="1" style="width: 100%">
		<tr>
			<th>Tanggal</th>
            <th>Jumlah Pasien Positif</th>
            <th>Jumlah Pasien Dirawat</th>
            <th>Jumlah Pasien Sembuh</th>
            <th>Jumlah Pasien Meninggal</th>
            <th>Total</th>
		</tr>
        <?php 
        
        $sql = mysql_query("SELECT * FROM pasien GROUP BY tgl_input ORDER BY tgl_input ASC");        

		while($data = mysql_fetch_array($sql)){
        $positif = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' AND tgl_input='$data[tgl_input]'");
        $p = mysql_fetch_array($positif);
        $rawat = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Dirawat' AND tgl_input='$data[tgl_input]'");
        $r = mysql_fetch_array($rawat);
        $sembuh = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Sembuh' AND tgl_input='$data[tgl_input]'");
        $s = mysql_fetch_array($sembuh);
        $meninggal = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Meninggal' AND tgl_input='$data[tgl_input]'");
        $m = mysql_fetch_array($meninggal);
        $total = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE (status='Positif' OR status='Dirawat' OR status='Sembuh' OR status='Meninggal') AND tgl_input='$data[tgl_input]'");
        $t = mysql_fetch_array($total);
		?>
		<tr>
			<td><?php echo $data['tgl_input']; ?></td>
			<td><?php echo $p['total']; ?></td>
            <td><?php echo $r['total']; ?></td>
            <td><?php echo $s['total']; ?></td>
            <td><?php echo $s['total']; ?></td>
            <td><?php echo $t['total']; ?></td>
		</tr>
		<?php 
		}
        ?>
        <tr>
            <th>Total</th>
            <?php
            $positif2 = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif'");
            $p2 = mysql_fetch_array($positif2);
            $rawat2 = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Dirawat'");
            $r2 = mysql_fetch_array($rawat2);
            $sembuh2 = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Sembuh'");
            $s2 = mysql_fetch_array($sembuh2);
            $meninggal2 = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Meninggal'");
            $m2 = mysql_fetch_array($meninggal2);
            $total2 = mysql_query("SELECT COUNT(id_pasien) as total, tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' OR status='Dirawat' OR status='Sembuh' OR status='Meninggal'");
            $t2 = mysql_fetch_array($total2);
            ?>
            <th><?php echo $p2['total'] ?></th>
            <th><?php echo $r2['total'] ?></th>
            <th><?php echo $s2['total'] ?></th>
            <th><?php echo $m2['total'] ?></th>
            <th><?php echo $t2['total'] ?></th>
		</tr>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>