<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>E-Koperasi - Data Anggota</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
              <h6 class="h2 text-white d-inline-block mb-0">Data Anggota</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Data Anggota</a></li>
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
                <div class="col-8">
                  <h3 class="mb-0">Daftar Anggota Koperasi </h3>
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
                    <form id="formdata" action="../config-data/tambah.php" method="post">
                      <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter email" id="email">
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Username</label>
                            <input name="username" type="text" id="username" class="form-control" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Password</label>
                            <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <label for="nama">Jalan</label>
                        <input name="jalan" id="jalan" type="text" class="form-control" placeholder="Jalan">
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Kelurahan</label>
                            <input name="kelurahan" type="text" id="kelurahan" class="form-control" placeholder="Kelurahan">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Kecamatan</label>
                            <input name="kecamatan" id="kecamatan" class="form-control" placeholder="Kecamatan">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Kode POS</label>
                            <input name="kodepos" id="kodepos" class="form-control" placeholder="Kode POS">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="nama">Telepon</label>
                        <input name="telepon" type="text" id="telepon" class="form-control" placeholder="Telepon">
                      </div>

                      <div class="form-group">
                        <label for="nama">Status</label>
                        <input name="status" type="text" id="status" class="form-control" placeholder="Status">
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
            $sql = "SELECT * FROM user ";
            $result = mysqli_query($conn, $sql) or die($mysqli_error);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
            ?>
                <div class='table-responsive'>
                  <table class='table align-items-center table-flush'>
                    <thead class='thead-light'>
                      <tr>

                        <th>Id</th>
                        <th>Nama</th>
                        <th>Jalan</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kode POS</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_USER'] . "</td>";
                        echo "<td>" . $row['NAMA'] . "</td>";
                        echo "<td>" . $row['JALAN'] . "</td>";
                        echo "<td>" . $row['KELURAHAN'] . "</td>";
                        echo "<td>" . $row['KECAMATAN'] . "</td>";
                        echo "<td>" . $row['KODE_POS'] . "</td>";
                        echo "<td>" . $row['TELEPON'] . "</td>";
                        echo "<td>" . $row['STATUS'] . "</td>";

                      ?>

                        <td>
                          <button class="btn btn-success m1" type="button" data-toggle="modal" data-target="#squarespaceModal" data-iduser="<?php echo $row['ID_USER'] ?>" data-email="<?php echo $row['EMAIL'] ?>" data-username="<?php echo $row['USERNAME'] ?>" data-password="<?php echo $row['PASSWORD'] ?>" data-nama="<?php echo $row['NAMA'] ?>" data-jalan="<?php echo $row['JALAN'] ?>" data-kelurahan="<?php echo $row['KELURAHAN'] ?>" data-kecamatan="<?php echo $row['KECAMATAN'] ?>" data-kodepos="<?php echo $row['KODE_POS'] ?>" data-telepon="<?php echo $row['TELEPON'] ?>" data-status="<?php echo $row['STATUS'] ?>">Edit</button>
                          <a href="#myModal" class="btn btn-danger m-1" data-toggle="modal">Delete</a>
                </div>

                <div id="myModal" class="modal fade">
                  <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                      <div class="modal-header flex-column">
                        <div class="icon-box">
                        
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title w-100">Apakah Anda Yakin?</h4>
                      </div>
                      <div class="modal-body">
                        <p>Anda akan menghapus data ini secara permanen.</p>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        <form action="../config-data/delete.php" class="d-inline" method="post">
                          <button type="submit" name="id" value="<?php echo $row['ID_USER']  ?>" class="btn btn-danger m-1">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>


                </td>


              <?php } ?>

              </tr>

              </tbody>
              </table>
          </div>
      <?php
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

        var id_user = button.data("iduser");
        var email = button.data("email");
        var username = button.data("username");
        var password = button.data("password");
        var nama = button.data("nama")
        var jalan = button.data("jalan");
        var kelurahan = button.data("kelurahan");
        var kecamatan = button.data("kecamatan");
        var kodepos = button.data("kodepos");
        var telepon = button.data("telepon");
        var status = button.data("status");


        var modal = $(this);
        modal.find("#email").val(email);
        modal.find("#username").val(username);
        modal.find("#password").val(password);
        modal.find("#nama").val(nama);
        modal.find("#jalan").val(jalan);
        modal.find("#kelurahan").val(kelurahan);
        modal.find("#kecamatan").val(kecamatan);
        modal.find("#kodepos").val(kodepos);
        modal.find("#telepon").val(telepon);
        modal.find("#status").val(status);

        if (id_user !== undefined) {
          modal.find("#formdata").attr("action", `../config-data/edit.php?id_user=${id_user}`);
        } else {
          modal.find("#formdata").attr("action", `../config-data/tambah.php`);
        }
      });
    })
  </script>

</body>

</html>