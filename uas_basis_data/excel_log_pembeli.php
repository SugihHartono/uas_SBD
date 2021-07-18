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
header("Content-Disposition: attachment; filename=Laporan_log_pembeli.xls");

?>
        <center>
								<h3></h3>
								<h3>Perubahan Data Pembeli </h3>
								<p>&nbsp;</p>
							</center>

							<table border='1' class="table table-hover table-bordered">
							  <thead>
							  <tr>
                                    <th>No</th>
                                    <th>No HP Lama</th>
                                    <th>NO HP Terbaru</th>
                                    <th>Nama Pembeli</th>
                                    <th>Nama Pembeli Update</th>
                                    <th>Alamat Lama</th>
                                    <th>Alamat Baru</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Perubahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sqlquery = "SELECT * FROM log_pembeli";
                                if ($result = mysqli_query($con, $sqlquery)) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>'<?php echo $row["no_hp_lama"]; ?></td>
                                            <td>'<?php echo $row["no_hp_baru"]; ?></td>
                                            <td><?php echo $row["nama_pembeli_lama"]; ?></td>
                                            <td><?php echo $row["nama_pembeli_baru"]; ?></td>
                                            <td><?php echo $row["alamat_lama"]; ?></td>
                                            <td><?php echo $row["alamat_baru"]; ?></td>
                                            <td><?php echo $row["ket"]; ?></td>
                                            <td><?php echo tgl_indo($row["waktu"]); ?></td>

                                            </td>
                                        </tr>
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