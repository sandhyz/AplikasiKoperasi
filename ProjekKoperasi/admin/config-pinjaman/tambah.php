<?php

include '../../login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $id_pinjam          = uniqid("SHA1");
    $id_user            = @$_POST['id_user'];
    $jumlah_pinjaman    = @$_POST['jumlah_pinjaman'];
    $bunga              = @$_POST['bunga'];
    $cicilan            = @$_POST['cicilan'];
    $angsuran     = @$_POST['angsuran'];
    $tanggal    = @$_POST['tanggal'];
   
    $jumlah_pinjaman = str_replace(".", "", $jumlah_pinjaman);
    


    
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
 
$sql = "INSERT INTO pinjaman VALUES(
    '$id_pinjam','$id_user','$jumlah_pinjaman', '$bunga', '$cicilan',
    '$angsuran', '$tanggal') ";
$query=mysqli_query($conn, $sql);

    header("location:../tampilan/pinjaman.php");

} else {
    echo "Data Yang Anda Masukan Gagal Ditambah!";
    die();
}

?>