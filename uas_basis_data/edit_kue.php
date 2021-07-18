<?php
include("db.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Data kue</title>
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


					<?php
						$kode_kue = $_GET['kode_kue'];
						$sqlquery = "SELECT * FROM kue WHERE kode_kue='$kode_kue'";
						$result = mysqli_query($con, $sqlquery) or die (mysqli_connect_error());
						$row = mysqli_fetch_assoc($result);
						?>

					<div class='panel panel-success'>
						<div class='panel-heading'>Edit Data Kue</div>
						<div class='panel-body'>
							<form method='post' action='opsi_kue.php?act=update'>
								<div class='form-group'>
								<input type="hidden" name="kode_kue" id="kode_kue" value="<?php echo $row["kode_kue"]; ?>">
								<div class='form-group'>
								<label>Nama Kue</label>
									<input type='text' class='form-control' name='nama_kue' value="<?php echo $row["nama_kue"]; ?>" required/>
								</div>
								<div class='form-group'>	
								<label>Jenis Kue</label>
									<input type='text' class='form-control' name='jenis_kue' value="<?php echo $row["jenis_kue"]; ?>" required/>
								</div>
								<div class='form-group'>
									<label>Harga Jual</label>
									<input type='text' class='form-control' name='harga_jual' value="<?php echo $row["harga_jual"]; ?>" required/>
								</div>
								
								<button type='input' name='update' class='btn btn-success'>Edit</button>
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
