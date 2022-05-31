<?php

include '../../login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $id_simpan  = uniqid("SHA1");
    $id_user    = @$_POST['id_user'];
    $jenis      = @$_POST['jenis'];
    $saldo      = @$_POST['saldo'];
    $tanggal    = @$_POST['tanggal'];
   
    $saldo = str_replace(".", "", $saldo);


    
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
 

$query=mysqli_query($conn, "INSERT INTO simpanan VALUES(
    '$id_simpan','$id_user', '$jenis', '$saldo',
    '$tanggal') ");
    
    header("location:../tampilan/simpanan.php");

} else {
    echo "Data Yang Anda Masukan Gagal Ditambah!";
    die();
}

?>