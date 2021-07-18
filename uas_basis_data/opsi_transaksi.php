<?php
include("db.php");

$act=$_GET['act'];

if ($act=='input'){
	$no_hp = $_POST['no_hp'];
	$kode_kue = $_POST['kode_kue'];
	$berat = $_POST['berat'];

	$sql = "INSERT INTO transaksi VALUES ('','$no_hp','$kode_kue', '$berat', '$hari_ini')";
	$aksi =mysqli_query($con, $sql);

	if($aksi)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";}

}




?>
