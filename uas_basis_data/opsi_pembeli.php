<?php
include("db.php");

$act=$_GET['act'];

if ($act=='delete'){
	$no_hp=$_GET['no_hp'];
	$row = mysqli_query($con, "DELETE FROM pembeli WHERE pembeli.no_hp = '$no_hp'");
	header('location:pembeli.php');
}

elseif ($act=='input'){
	$no_hp = $_POST["no_hp"];
	$nama_pembeli = $_POST["nama_pembeli"];
	$alamat = $_POST["alamat"];

	$sql = "INSERT INTO pembeli VALUES ('$no_hp','$nama_pembeli','$alamat')";
	$aksi =mysqli_query($con, $sql);

	if($aksi)
	{
	header('location:pembeli.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$no_hp = $_POST["no_hp"];
	$nama_pembeli = $_POST["nama_pembeli"];
	$alamat = $_POST["alamat"];

	$sql = "UPDATE pembeli SET nama_pembeli='$nama_pembeli', alamat='$alamat' WHERE no_hp='$no_hp'";

	if(mysqli_query($con, $sql)){
		mysqli_close($con);
		header('location:pembeli.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
