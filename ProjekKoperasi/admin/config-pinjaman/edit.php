<?php

include '../../login/config/config.php';
$id_pinjam          = @$_GET['id_pinjaman'];
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    
    $id_user            = @$_POST['id_user'];
    $jumlah_pinjaman    = @$_POST['jumlah_pinjaman'];
    $bunga              = @$_POST['bunga'];
    $cicilan            = @$_POST['cicilan'];
    $angsuran     = @$_POST['angsuran'];
    $tanggal    = @$_POST['tanggal'];
   
    $jumlah_pinjam = str_replace(".", "", $jumlah_pinjaman);


    
    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    // $email       = $mysqli->escape_string($email);
    // $username          = $mysqli->escape_string($username);
    // $password       = $mysqli->escape_string($password);
    // $nama           = strtoupper($mysqli->escape_string($nama));
    // $jalan   = $mysqli->escape_string($jalan);
    // $kelurahan  = $mysqli->escape_string($kelurahanl_lahir);
    // $kecamatan  = $mysqli->escape_string($kecamatan);
    // $kodepos          = $mysqli->escape_string($kodepos);
    // $telepon          = $mysqli->escape_string($telepon);



    //Store data siswa ke dalam table siswa
 
$sql = "UPDATE pinjaman SET
ID_USER='$id_user', JUMLAH_PINJAMAN='$jumlah_pinjam' , BUNGA='$bunga', LAMA_CICILAN='$cicilan', 
ANGSURAN='$angsuran', TANGGAL_JATUH_TEMPO='$tanggal' WHERE ID_PINJAMAN='$id_pinjam' ";
$query=mysqli_query($conn, $sql);

    header("location:../tampilan/pinjaman.php");

} else {
    echo "Data Yang Anda Masukan Gagal Ditambah!";
    die();
}

?>