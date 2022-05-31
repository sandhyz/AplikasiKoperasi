<?php 
session_start();

include '../../login/config/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = @$_POST['id'];


    // $id = mysqli_real_escape_string($id);

    $query_user = mysqli_query($conn, "SELECT * FROM user WHERE ID_USER = '$id'");
   

    if ($query_user->num_rows != 0){
        //Delete 
        $sql = "DELETE FROM user WHERE ID_USER = '$id'";
        $query_delete_user  = mysqli_query($conn, $sql ) ;

        header("location:../tampilan/data.php");
    } else {
        header("location:index.php");
    }
}

?>