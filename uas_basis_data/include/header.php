<?php
include("auth.php"); //include auth.php file on all secure pages ?>

	<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><li class="form">
				Selamat Datang <?php echo $_SESSION['username']; ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><i class='fa fa-home'></i> Beranda</a></li>
            <li><a href="pembeli.php"><i class='fa fa-users'></i> Data Pembeli</a></li>
            <li><a href="kue.php"><i class='fa fa-file'></i> Data KUE</a></li>
            <li><a href="transaksi.php"><i class='fa fa-plus'></i> Tambah Data Transaksi</a></li>
           <li> <a href="laporan.php"><i class='fa fa-file'></i> Laporan</a></li>
            <li><a href="log_pembeli.php"><i class='fa fa-file'></i> History Data</a></li>
				    
        
          </div>
          </div></ul></ul>
          </div>    
          </div>
        </div>