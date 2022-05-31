<?php

include_once '../../login/config/config.php';

$id_user = $_GET["id_user"];
$sql_pembayaran_user = "SELECT * FROM pembayaran WHERE ID_USER = '$id_user' ORDER BY ANGSURAN_KE DESC LIMIT 1";
$query_pembayaran_user = mysqli_query($conn, $sql_pembayaran_user);
$data_pembayaran_user = mysqli_fetch_assoc($query_pembayaran_user);
// echo $data_pembayaran_user != null;
// die();
if ($data_pembayaran_user == null){
    
    $sql_pinjaman_user = "SELECT * FROM pinjaman WHERE ID_USER = '$id_user'";
    $query_pinjaman_user = mysqli_query($conn, $sql_pinjaman_user);

    $data_pinjaman_user = mysqli_fetch_assoc($query_pinjaman_user);

    $sisa = $data_pinjaman_user['JUMLAH_PINJAMAN'] + $data_pinjaman_user["BUNGA"];

    $data_return = array(
        "ID_USER" => $data_pinjaman_user["ID_USER"],
        "ANGSURAN_KE" => 0,
        "ID_PINJAMAN" => $data_pinjaman_user["ANGSURAN"],
        "SISA_PEMBAYARAN" => $sisa
    );

    echo json_encode($data_return);
} else {
    echo json_encode($data_pembayaran_user);
}


?>