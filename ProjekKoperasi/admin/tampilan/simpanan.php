<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>E-Koperasi - Simpanan Anggota</title>
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
              <h6 class="h2 text-white d-inline-block mb-0">Simpanan Anggota</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Simpanan Anggota</a></li>
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
                  <h3 class="mb-0">Simpanan Anggota Koperasi </h3>
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

               
                <div class="col-4 text-right ">
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
                    <form id="formSimpanan" action="../config-simpanan/tambah.php" method="post">

                      <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <select class="form-control" id="nama" name="id_user">
                        <option value="-" selected disabled>-- Pilih Nama Anggota --</option>
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
                        <label for="saldo">Saldo</label>
                        <input name="saldo" id="saldo" type="text" class="form-control" placeholder="Saldo">
                      </div>

                      <div class="form-group">
                        <label for="nama">Simpanan</label>
                        <select class="form-control" id="jenis" name="jenis">
                          <option value="Pokok">Pokok</option>
                          <option value="Sukarela">Sukarela</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="nama">Tanggal Simpanan</label>
                        <input type="date" class="form-control" id="tanggalsimpanan" name="tanggal" value="2022-01-01" min="2022-01-01">
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
            $sql = "SELECT simpanan.*, user.* FROM simpanan, user WHERE simpanan.ID_USER = user.ID_USER";
            $result = mysqli_query($conn, $sql) or die($mysqli_error);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table align-items-center table-flush'>";
                echo "<thead class='thead-light'>";
                echo "<tr>";

                echo "<th>Id</th>";
                echo "<th>Nama</th>";
                echo "<th>Jenis Simpanan</th>";
                echo "<th>Saldo</th>";
                echo "<th>Tanggal</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['ID_USER'] . "</td>";
                  echo "<td>" . $row['NAMA'] . "</td>";
                  echo "<td>" . $row['JENIS_SIMPANAN'] . "</td>";
                  echo "<td>" . number_format($row['SALDO'], 0, '', '.')  . "</td>";
                  echo "<td>" . $row['TANGGAL_SIMPANAN'] . "</td>";


            ?>

                  <td>
                    <!-- <a href="edit.php? id_user=<?php //echo $row['id']  
                                                    ?>" class="btn btn-success m-1">Edit</a> -->
                    <button class="btn btn-success m1" type="button" data-toggle="modal" 
                    data-target="#squarespaceModal" data-idsimpanan="<?php echo $row['ID_SIMPANAN'] ?>" 
                    data-iduser="<?php echo $row['ID_USER'] ?>" data-jenissimpanan="<?php echo $row['JENIS_SIMPANAN'] ?>"
                    data-saldo="<?php echo $row['SALDO'] ?>" data-jumlah="<?php echo $row['SALDO'] ?>"
                    data-tanggalsimpanan="<?php echo $row['TANGGAL_SIMPANAN'] ?>" >Edit</button>
                  
                    <form action="../config-simpanan/delete.php" class="d-inline" method="post">
                      <button type="submit" name="id" value="<?php echo $row['ID_SIMPANAN']  ?>" class="btn btn-danger m-1">Delete</button>
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
      $("#squarespaceModal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);

        var id_simpanan = button.data("idsimpanan");
        var id_user = button.data("iduser");
        var jenis_simpanan = button.data("jenissimpanan");
        var saldo = button.data("saldo");
        var tanggal_simpanan = button.data("tanggalsimpanan");
        

        var modal = $(this);
        modal.find("#nama").val(id_user);
        modal.find("#jenis").val(jenis_simpanan);
        modal.find("#saldo").val(saldo);
        modal.find("#tanggalsimpanan").val(tanggal_simpanan);

        if (id_user !== undefined) {
          modal.find("#formSimpanan").attr("action", `../config-simpanan/edit.php?id_simpanan=${id_simpanan}`);
        } else {
          modal.find("#formSimpanan").attr("action", `../config-simpanan/tambah.php`);
        }
      });
    })
  </script>

<script>
    $(document).ready(function() {
      if ($("#saldo").value !== null) {
        $("#jenis").on("change", function() {
          var valsaldo = $("#saldo").val();
          var valjenis = $(this).children("option:selected").val();
          valsaldo = valsaldo.replace(/\./g, '');
       
          var dot_saldo = valsaldo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');


          $("#saldo").val(dot_saldo);
       


        });


      }
    });
  </script>

</body>

</html>