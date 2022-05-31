<?php 
session_start();

include '../../login/config/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = @$_POST['id'];


    // $id = mysqli_real_escape_string($id);

    $query_user = mysqli_query($conn, "SELECT * FROM pembayaran WHERE ID_PEMBAYARAN = '$id'");
   

    if ($query_user->num_rows != 0){
        //Delete 
        
        $query_delete_user            = mysqli_query($conn, "DELETE FROM pembayaran WHERE ID_PEMBAYARAN = '$id'" ) or die(mysqli_error);
       
        header("location:../tampilan/pembayaran.php");
    } else {
        header("location:index.php");
    }
}

?>