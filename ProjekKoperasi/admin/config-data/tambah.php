<?php

include '../../login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $id = uniqid('SHA1');
    $email          = @$_POST['email'];
    $username       = @$_POST['username'];
    $password       = @$_POST['password'];
    $nama           = @$_POST['nama'];
    $jalan   = @$_POST['jalan'];
    $kelurahan  = @$_POST['kelurahan'];
    $kecamatan  = @$_POST['kecamatan'];
    $kodepos          = @$_POST['kodepos'];
    $telepon     = @$_POST['telepon'];
    $status     =  @$_POST['status'];
   


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
 
$sql=  "INSERT INTO user VALUES(
    '$id','$email', '$username', '$password', '$nama', '$jalan', '$kelurahan',
    '$kecamatan', '$kodepos','$telepon', '$status') ";

$query=mysqli_query($conn, $sql);
    
    header("location:../tampilan/data.php");

} else {
    echo "Data Yang Anda Masukan Gagal Ditambah!";
    die();
}

?>