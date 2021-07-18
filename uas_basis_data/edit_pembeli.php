<?php
include("db.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Data Pembeli</title>
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
						$no_hp = $_GET['no_hp'];
						$sqlquery = "SELECT * FROM pembeli WHERE no_hp='$no_hp'";
						$result = mysqli_query($con, $sqlquery) or die (mysqli_connect_error());
						$row = mysqli_fetch_assoc($result);
						?>
					<div class='panel panel-success'>
						<div class='panel-heading'>Edit Data Pembeli</div>
						<div class='panel-body'>
							<form method='post' action='opsi_pembeli.php?act=update'>
								<div class='form-group'>
									<label>NO HP</label>
									<input type="text" class='form-control' name="no_hp" id="no_hp" value="<?php echo $row["no_hp"]; ?>"require/>
								</div>
								<div class='form-group'>
									<label>Nama Pembeli</label>
									<input type='text' class='form-control' name='nama_pembeli' value="<?php echo $row["nama_pembeli"]; ?>" required/>
								</div>
								<div class='form-group'>
									<label>Alamat</label>
									<input type='text' class='form-control' name='alamat' value="<?php echo $row["alamat"]; ?>" required/>
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
