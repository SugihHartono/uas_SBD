<?php
include("db.php");
include("fungsi/fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Data Transaksi</title>
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
					<div class='panel panel-danger' id='tambah'>
						<div class='panel-heading'>Tambah Data Transaksi</div>
						<div class='panel-body'>


							<form method='post' action='opsi_transaksi.php?act=input'>
								<div class='form-group'>

									<label>Nama Pembeli</label>
									<select name='no_hp' class='form-control'>
									<?php
									$sqlquery = "SELECT * FROM pembeli";
									if ($result = mysqli_query($con, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
											$no_hp = $row["no_hp"];
											$nama_pembeli = $row["nama_pembeli"];
											echo "<option value='$no_hp'>$nama_pembeli</option>";
										}
										mysqli_free_result($result);
									}
									?>
									</select>

								</div>
								<div class='form-group'>
									<label>Pilih Jenis Kue</label>
									<select name='kode_kue' class='form-control'>
									<?php
									$sqlquery = "SELECT * FROM kue";
									if ($result = mysqli_query($con, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
											$kode_kue = $row["kode_kue"];
											$nama_kue = $row["nama_kue"];
											echo "<option value='$kode_kue'>$nama_kue</option>";
										}
										mysqli_free_result($result);
									}
									
									?>
								</select>	
							  
								<tr>
								<?php
									$sqlquery = "SELECT * FROM kue";
									if ($result = mysqli_query($con, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
									?>
								<td><?php echo $row["nama_kue"];?></td>
								<td><?php echo rupiah($row["harga_jual"]);?></td>
								
							  
							
							<?php
										}
										mysqli_free_result($result);
									}
									mysqli_close($con);
									?>
								</div>

									<div class='form-group'>
									<label>Berat (Kg)</label>
									<input type='number' name='berat' class='form-control' required/>
								</div>
								<button type='input' name='input' class='btn btn-danger'>Simpan</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("include/footer.php"); ?>
	</body>
	<?php include("include/js.php"); ?>
</html>

