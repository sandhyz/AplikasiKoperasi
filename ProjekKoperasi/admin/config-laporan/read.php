<?php 

 // Include config file
 include "../../login/config/config.php";
 // Attempt select query execution
 $sqluser = "SELECT SUM(simpanan.SALDO) as total_wajib, user.* FROM simpanan INNER JOIN user ON simpanan.ID_USER = user.ID_USER WHERE simpanan.JENIS_SIMPANAN = 'Wajib' GROUP BY ID_USER;";
//  $queryuser = mysqli_query($conn, $sqluser) ;
 
// $id_user_arr = array();

// while ($item = mysqli_fetch_assoc($queryuser)){
//     $id_user_arr[] = $item;
// }

// //  $id_user   = @$_GET['id_user'];
//  var_dump($id_user_arr);
//  $querywajib = mysqli_query($conn, "SELECT sum(simpanan.SALDO) AS 'total_wajib' FROM simpanan WHERE simpanan.JENIS_SIMPANAN='Wajib' ;") or die();

//  while ($item = mysqli_fetch_assoc($queryuser)){
//     $id_user_arr[] = $item;
// }

//  $datasimpanan = mysqli_fetch_assoc($querywajib);
//  $totalsimpanan =$datasimpanan["total_wajib"];
