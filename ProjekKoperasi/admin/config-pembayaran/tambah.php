<?php

include '../../login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $id_pembayaran  = uniqid("SHA1");
    // $id_pinjaman = @$_GET['id_pinjaman'];
    $id_user    = @$_POST['id_user'];
    $angsuran      = @$_POST['angsuran'];
    $bunga      = @$_POST['bunga'];
    $sisa     = @$_POST['sisa'];
    $denda    = @$_POST['denda'];
    $keterangan    = @$_POST['keterangan'];

    $sisa = $sisa - $bunga;
    $created_at = date("Y-m-d H:i:s");

    // var_dump($id_pinjaman)
   
    // $sql_pinjaman = "SELECT * FROM pinjaman WHERE ID_USER = '$id_user'";
    // $query_pinjaman = $mysqli_query($conn, $sql_pinjaman);

    // $data_pinjaman = mysqli_fetch_assoc($query_pinjaman);
    // $id_pinjaman = $data_pinjaman["id_pinjaman"];
    
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
 

$sql = "INSERT INTO pembayaran VALUES(
    '$id_pembayaran','$id_user', '$bunga',
    '$angsuran', '$sisa','$denda','$keterangan', '$created_at')" ;

$query=mysqli_query($conn, $sql);



    
    header("location:../tampilan/pembayaran.php");

} else {
    echo "Data Yang Anda Masukan Gagal Ditambah!";
    die();
}

?>