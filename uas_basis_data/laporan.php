<?php
include("db.php");
include("fungsi/fungsi_indotgl.php");
include("fungsi/fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Laporan</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include("include/css.php"); ?>
	</head>
	<body>
		<header>
			<?php include("include/header.php"); ?>
		</header>
		<div class='container' style='margin-top:70px'>
			<div class='row' style='min-height:520px'>
				<div class='col-md-12'>
					<div class='panel panel-success'>
						<div class='panel-heading'>Laporan</div>
						<div class='panel-body'>
						<a href="excel.php" class="btn btn-success" target="_blank"><i class="fa fa-print"></i>Show Excel</a>
						<a href="cetak.php" class="btn btn-success" target="_blank"><i class="fa fa-print"></i>print</a>
							<center>
								<h3></h3>
								<h3>Laporan Penjualan Kue</h3>
								<p>&nbsp;</p>
							</center>

							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>No</th>
								  <th>Tanggal Transaksi</th>
								  <th>Admin</th>
								  <th>Nama</th>
								  <th>No HP</th>
								  <th>Alamat</th>
								  <th>Nama Kue </th>
								  <th>Jenis Kue</th> 
								  <th>Harga Jual</th>
								  <th>Berat (Kg)</th>
								  <th>Total</th>
								  
								  
								</tr>
							  </thead>
							  <tbody>
								<?php
									$no = 1;
									$total_semua = 0;
									$sqlquery = "SELECT pembeli.*, kue.*, transaksi.* FROM transaksi transaksi INNER JOIN pembeli pembeli ON transaksi.no_hp = pembeli.no_hp INNER JOIN kue kue ON transaksi.kode_kue = kue.kode_kue ORDER BY transaksi.no_hp ASC";
									if ($result = mysqli_query($con, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
										$total = ($row["harga_jual"] * $row["berat"]);
										$total_semua += $total;

								?>
								<tr>
								<td><?php echo $no ?></td>
								<td><?php echo tgl_indo($row["tanggal"]);?></td>
								<td><?php echo $_SESSION['username']; ?></td>
								<td><?php echo $row["nama_pembeli"];?></td>
								<td><?php echo $row["no_hp"];?></td>
								<td><?php echo $row["alamat"];?></td>
								<td><?php echo $row["nama_kue"];?></td>
								<td><?php echo $row["jenis_kue"];?></td>
								<td><?php echo rupiah($row["harga_jual"]);?></td>
								<td><?php echo $row["berat"];?></td>
								<td><?php echo rupiah($total);?></td>
								
								
								</tr>
								<?php
									$no++;}
								?>
								<tr>
								<td colspan='10'>Grand Total</td>
								<td colspan='1'><?php echo rupiah($total_semua); ?></td>
								</tr>
								<?php
										mysqli_free_result($result);
									}
									mysqli_close($con);
									?>
							  </tbody>
							</table>
							<p>
							<div>
							Cikarang, <?php echo tgl_indo($hari_ini); ?><br>
							<b>Manager Perusahaan</b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b>Sugih Hartono</b>
							
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php include("include/footer.php"); ?>
	</body>
	<?php include("include/js.php"); ?>
	
</html>
