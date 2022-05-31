<?php

// include php

include "../../login/config/config.php";


$query_total_jasa = mysqli_query($conn, "SELECT SUM(pinjaman.BUNGA) AS 'total_jasa' FROM pinjaman") or die($mysqlierror);
$datajasa = mysqli_fetch_assoc($query_total_jasa);
$totaljasa =$datajasa["total_jasa"];

$query_total_simpanan = mysqli_query($conn, "SELECT SUM(simpanan.SALDO) AS 'total_simpanan' FROM simpanan") or die($mysqli_error);
$datasimpanan = mysqli_fetch_assoc($query_total_simpanan);
$totalsimpanan =$datasimpanan["total_simpanan"];

$query_total_pinjaman = mysqli_query($conn, "SELECT SUM(pinjaman.JUMLAH_PINJAMAN) AS 'total_pinjaman' FROM pinjaman") or die($mysqli_error);
$datapinjaman = mysqli_fetch_assoc($query_total_pinjaman);
$totalpinjaman =$datapinjaman["total_pinjaman"];

$query_total_user = mysqli_query($conn, "SELECT MIN(pembayaran.SISA_PEMBAYARAN) AS 'sisa_pembayaran' FROM pembayaran") or die($mysqli_error);
$datauser = mysqli_fetch_assoc($query_total_user);
$totaluser = $datauser["sisa_pembayaran"];
