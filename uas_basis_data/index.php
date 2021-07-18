<?php
include("auth.php"); //include auth.php file on all secure pages ?>


<!DOCTYPE html>

<html>

<head>

  <title>Beranda</title>

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

        <div class="jumbotron">

          <center>
            <h1>Penjualan Kue Tradisional</h1>

            <marquee behavior="alternate" scrollamount="10"><p>Aplikasi Pengelolaan Laporan Penjualan Kue Tradisional</p></marquee>
			
            <p>

              <a class='btn btn-primary' href='pembeli.php'>Data Pembeli</a>

              <a class='btn btn-info' href='kue.php'>Data Kue</a>

              <a class='btn btn-danger' href='transaksi.php'>Tambah Data Transaksi</a>

              <a class='btn btn-success' href='laporan.php'>Laporan</a>

              <a class='btn btn-success' href="log_pembeli.php"> History Data</a>

            </center>

          </div>

        </div>

      </div>

    </div>

		

    <?php include("include/footer.php"); ?>


  <?php include("include/js.php"); ?>
  </body>

	</html>

