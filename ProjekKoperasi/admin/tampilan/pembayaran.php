<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>E-Koperasi - Pembayaran Anggota</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

  <!-- Sidenav -->

  <?php include 'sidebar.php' ?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include 'topbar.php' ?>
    <!-- Header -->
    <div class="header bg-success pb-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pembayaran Anggota</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pembayaran Anggota</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-5">
                  <h3 class="mb-0">Pembayaran Anggota Koperasi </h3>
                </div>
                <div class="row">
                  <div class="span12">
                    <form id="custom-search-form" class="form-search form-horizontal pull-right">
                    <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
                    </form>
                  </div>
                </div>

                <div class="col-4 text-right">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#squarespaceModal">Tambah</button>
                </div>
              </div>
            </div>

            <!-- modal -->
            <!-- line modal -->
            <div class="modal fade " id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                  </div>
                  <div class="modal-body">

                    <!-- content goes here -->
                    <form action="../config-pembayaran/tambah.php" method="POST">

                      <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <select class="form-control" id="nama" name="id_user">
                        <option value="-" selected disabled>-- Pilih Nama Anggota</option>
                          <?php
                          // Include config file
                          include "../../login/config/config.php";

                          // Attempt select query execution
                          $sql = "SELECT ID_USER ,NAMA FROM user";
                          $result = mysqli_query($conn, $sql) or die($mysqli_error);
                          if ($result) {

                            if (mysqli_num_rows($result) > 0) {
                          ?>

                              <?php
                              while ($row = mysqli_fetch_array($result)) {
                              ?>
                                <option value="<?php echo $row['ID_USER'] ?>"><?php echo $row['NAMA']  ?></option>
                          <?php
                              }
                            }
                          } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="nama">Angsuran Ke-</label>
                        <input type="text" class="form-control" id="angsuran" name="angsuran" placeholder="Ke-">
                      </div>

                      <div class="form-group">
                        <label for="nama">Angsuran</label>
                        <!-- <select class="form-control" id="bunga" name="bunga" disabled>
                        <option value="-" selected disabled>-- Pilih Bunga</option> -->
                          <?php
                          // Include config file
                          // include "../../login/config/config.php";

                          // // Attempt select query execution
                          // $sql = "SELECT ID_USER ,BUNGA FROM pinjaman";
                          // $result = mysqli_query($conn, $sql) or die($mysqli_error);
                          // if ($result) {

                          //   if (mysqli_num_rows($result) > 0) {
                          ?>

                              <?php
                              //while ($row = mysqli_fetch_array($result)) {
                              ?>
                                <!-- <option value="<?php //echo $row['ID_USER'] ?>"><?php //echo $row['BUNGA']  ?></option> -->
                          <?php
                              //}
                            //}
                          //} else {
                            //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                          //}
                          ?>
                        <!-- </select> -->
                        <input class="form-control" type="text" id="bunga" name="bunga" placeholder="angsuran" readonly>
                        <!-- <input type="text" id="bungan_value" name="bunga"> -->
                      </div>

                      <div class="form-group">
                        <label for="nama">Sisa</label>
                        <input type="text" class="form-control" id="sisa" name="sisa" placeholder="Sisa" readonly>
                      </div>

                      <div class="form-group">
                        <label for="nama">Denda</label>
                        <input type="text" class="form-control" name="denda" placeholder="Denda">
                      </div>

                      <div class="form-group">
                        <label for="nama">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                      </div>

                      <button class="btn btn-default bg-primary">Submit</button>

                    </form>

                  </div>

                </div>
              </div>
            </div>

            <!-- table -->
            <?php
            // Include config file
            include "../../login/config/config.php";

            // Attempt select query execution
            $sql = "SELECT pembayaran.*, user.ID_USER, user.NAMA, pinjaman.angsuran FROM pembayaran LEFT JOIN user ON pembayaran.ID_USER = user.ID_USER LEFT JOIN pinjaman ON pembayaran.ID_PINJAMAN = pinjaman.ID_PINJAMAN;";
            $result = mysqli_query($conn, $sql) or die($mysqli_error);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table align-items-center table-flush'>";
                echo "<thead class='thead-light'>";
                echo "<tr>";

                echo "<th>Id</th>";
                echo "<th>Nama</th>";
                echo "<th>Angsuran Ke-</th>";
                echo "<th>Bunga</th>";
                echo "<th>Sisa</th>";
                echo "<th>Denda</th>";
                echo "<th>Keterangan</th>";
                echo "<th>Action</th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['ID_USER'] . "</td>";
                  echo "<td>" . $row['NAMA'] . "</td>";
                  echo "<td>" . $row['ANGSURAN_KE'] . "</td>";
                  echo "<td>" . number_format($row['ID_PINJAMAN']  != '' ? $row['ID_PINJAMAN'] : 0, 0, '', '.') . "</td>";
                  echo "<td>" . number_format($row['SISA_PEMBAYARAN']  != '' ? $row['SISA_PEMBAYARAN'] : 0, 0, '', '.') . "</td>";
                  echo "<td>" . number_format($row['DENDA'] != '' ? $row['DENDA'] : 0, 0, '', '.') . "</td>";
                  echo "<td>" . $row['KETERANGAN'] . "</td>";


            ?>

                  <td>
                    
                    <button class="btn btn-success m1" type="button" data-toggle="modal" data-target="#squarespaceModal"
                    data-idpembayaran="<?php echo $row['ID_PEMBAYARAN'] ?>" data-iduser="<?php echo $row['ID_USER'] ?>"
                    data-angsuran="<?php echo $row['ANGSURAN_KE'] ?>" data-idpinjaman="<?php echo $row['ID_PINJAMAN'] ?>" 
                    data-sisa="<?php echo $row['SISA_PEMBAYARAN'] ?>" data-denda="<?php echo $row['DENDA'] ?>" 
                    data-keterangan="<?php echo $row['KETERANGAN'] ?>">Edit</button>

                    <form action="../config-pembayaran/delete.php" class="d-inline" method="post">
                      <button type="submit" name="id" value="<?php echo $row['ID_PEMBAYARAN']  ?>" class="btn btn-danger m-1">Delete</button>
                    </form>


                  </td>
            <?php

                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
              } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
              }
            } else {
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }


            ?>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <?php include "footer.php" ?>

    </div>
  </div>
  
  



  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>

  <script>
    $(document).ready(function() {
      $("#nama").on("change", function(){
        let id_user = $("#nama").children("option:selected").val()

        // $(`#bunga`).children(`option[value="${id_user}"]`).attr("selected", true)
        // console.log($(`#bunga`).children(`option[value="${id_user}"]`));

        $.ajax({
          url: "../config-pembayaran/api_form.php",
          method: "GET",
          data: {"id_user" : id_user}
        }).done(function(data){
          let data_pembayaran = JSON.parse(data);
          let angsuran_ke = parseInt(data_pembayaran.ANGSURAN_KE) + 1;

          $("#bunga").val(data_pembayaran.ID_PINJAMAN);
          $("#sisa").val(data_pembayaran.SISA_PEMBAYARAN);
          $("#angsuran").val(angsuran_ke);
          // $("#bunga").text(data_pembayaran.ID_PINJAMAN);

          console.log(data_pembayaran, angsuran_ke);
        });
      })

    })
  </script>
</body>

</html>