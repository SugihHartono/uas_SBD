<?php
include("db.php");
include("fungsi/fungsi_indotgl.php");
include("fungsi/fungsi_rupiah.php");
include("auth.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Laporan</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_log_kue.xls");

?>
        <center>
								<h3></h3>
								<h3>Perubahan Data Kue</h3>
								<p>&nbsp;</p>
							</center>

							<table border='1' class="table table-hover table-bordered">
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
                                            <td><?php echo tgl_indo($row["waktu"]); ?></td>        </tr>
                                <?php
                                    $no++;}
                                    mysqli_free_result($result);
                                }
                                mysqli_close($con);
                                ?>
							  </tbody>
							</table>
							<p>
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
    </body>
</html>