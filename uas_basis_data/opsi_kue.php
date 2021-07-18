<?php
include("db.php");

$act=$_GET['act'];

if ($act=='delete'){
	$kode_kue=$_GET['kode_kue'];
	$row = mysqli_query($con, "DELETE FROM kue WHERE kode_kue = '$kode_kue'");
	header('location:kue.php');
}

elseif ($act=='input'){
	$kode_kue = $_POST["kode_kue"];
	$nama_kue = $_POST["nama_kue"];
	$jenis_kue = $_POST["jenis_kue"];
	$harga_jual = $_POST["harga_jual"];


	$sql = "INSERT INTO kue VALUES ('$kode_kue','$nama_kue','$jenis_kue','$harga_jual')";
	$aksi =mysqli_query($con, $sql);

	if($aksi)
	{
	header('location:kue.php');
	}
	else {echo "gagal";}

}

elseif ($act=='update'){
	$kode_kue = $_POST["kode_kue"];
	$nama_kue = $_POST["nama_kue"];
	$jenis_kue = $_POST["jenis_kue"];
	$harga_jual = $_POST["harga_jual"];

	$sql = "UPDATE kue SET kode_kue='$kode_kue', nama_kue='$nama_kue', jenis_kue='$jenis_kue', harga_jual='$harga_jual' WHERE kode_kue='$kode_kue'";

	if(mysqli_query($con, $sql)){
		mysqli_close($con);
		header('location:kue.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
