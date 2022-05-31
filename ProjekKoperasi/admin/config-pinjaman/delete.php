<?php 
session_start();

include '../../login/config/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = @$_POST['id'];


    // $id = mysqli_real_escape_string($id);

    $query_user = mysqli_query($conn, "SELECT * FROM pinjaman WHERE ID_PINJAMAN = '$id'");
   

    if ($query_user->num_rows != 0){
        //Delete 
        
        $query_delete_user            = mysqli_query($conn, "DELETE FROM pinjaman WHERE ID_PINJAMAN = '$id'" ) or die(mysqli_error);
       
        header("location:../tampilan/pinjaman.php");
    } else {
        header("location:index.php");
    }
}

?>