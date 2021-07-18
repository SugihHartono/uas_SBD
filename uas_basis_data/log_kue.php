<?php
include("db.php");
include("fungsi/fungsi_rupiah.php");
include("fungsi/fungsi_indotgl.php");
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
                    <div class='panel-heading'>Data Kue</div>
                    <div class='panel-body'>
                        <a class='btn btn-info' href='log_pembeli.php'><i class='fa fa-file'></i>Data Pembeli</a>
                        <a class='btn btn-info' href='log_kue.php'><i class='fa fa-file'></i>Data Kue</a>
                        <a href="excel_log_kue.php" class="btn btn-success" target="_blank"><i class="fa fa-print"></i>Show Excel</a>
						<a href="cetak_log_kue.php" class="btn btn-success" target="_blank"><i class="fa fa-print"></i>print</a>
						
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rescode Kue Sebelumnya</th>
                                    <th>Rescode Kue Terbaru</th>
                                    <th>Nama Kue sebelumnya</th>
                                    <th>Nama Kue Terbaru</th>
                                    <th>Jenis sebelumnya</th>
                                    <th>Jenis Terbaru</th>
                                    <th>Harga Lama</th>
                                    <th>Harga Baru</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sqlquery = "SELECT * FROM log_kue";
                                if ($result = mysqli_query($con, $sqlquery)) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row["kode_kue_lama"]; ?></td>
                                            <td><?php echo $row["kode_kue_baru"]; ?></td>
                                            <td><?php echo $row["nama_kue_lama"]; ?></td>
                                            <td><?php echo $row["nama_kue_baru"]; ?></td>
                                            <td><?php echo $row["jenis_kue_lama"]; ?></td>
                                            <td><?php echo $row["jenis_kue_baru"]; ?></td>
                                            <td><?php echo rupiah($row["harga_jual_lama"]); ?></td>
                                            <td><?php echo rupiah($row["harga_jual_baru"]); ?></td>
                                            <td><?php echo $row["ket"]; ?></td>
                                            <td><?php echo tgl_indo($row["waktu"]); ?></td>
                                                                                    </tr>
                                <?php
                                 $no ++;   }
                                    mysqli_free_result($result);
                                }
                                mysqli_close($con);
                                ?>
                                
                            </tbody>
                        </table>
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