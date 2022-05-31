<?php
    session_start();

    function cekLogin() {
        $username = @$_SESSION['username'];
        $password = @$_SESSION['password'];

        if (empty($username) AND empty($password)) {
            header("location:/PROJEK/login/index.php");
        }
    }

    function sudahLogin() {
        $email = @$_SESSION['email'];
        $nama_hak_akses = @$_SESSION['nama_hak_akses'];

        if (!empty($email) AND !empty($nama_hak_akses)) {
            header("location:/4_my_point/index.php");
        }
    }
?>