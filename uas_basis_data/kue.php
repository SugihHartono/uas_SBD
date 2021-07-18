<?php
include("db.php");
include("fungsi/fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Kue</title>
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

					<div class='panel panel-info'>
						<div class='panel-heading'>Semua Data Kue</div>
						<div class='panel-body'>
							<a class='btn btn-info' href='tambah_kue.php'><i class='fa fa-plus'></i> Tambah Data Kue</a>
							<p>
							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>Rescode Kue</th>
								  <th>Nama Kue</th>
								  <th>Jenis Kue</th>
								  <th>Harga Jual</th>
								  <th>Opsi</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
									$sqlquery = "SELECT * FROM kue";
									if ($result = mysqli_query($con, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<td><?php echo $row["kode_kue"];?></td>
								<td><?php echo $row["nama_kue"];?></td>
								<td><?php echo $row["jenis_kue"];?></td>
								<td><?php echo rupiah($row["harga_jual"]);?></td>
								<td>
								<div class="btn-group">
								 <a href="edit_kue.php?kode_kue=<?php echo $row["kode_kue"];?>" class="btn btn-xs btn-success" title='Edit'> <i class="fa fa-edit"></i> </a>
								  <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?');" href="opsi_kue.php?act=delete&kode_kue=<?php echo $row["kode_kue"];?>" class="btn btn-xs btn-danger"> <i class="fa fa-remove" title='Hapus'></i> </a>
								</div>
								</td>
								</tr>
								<?php
										}
										mysqli_free_result($result);
									}
									mysqli_close($con);
									?>
							  </tbody>
							</table>
						</div>
					</div>
					

				</div>
			</div>
		</div>
		<?php include("include/footer.php"); ?>
	</body>
	<?php include("include/js.php"); ?>
</html>
