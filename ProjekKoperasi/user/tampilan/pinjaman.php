<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>E-Koperasi - Pinjaman Anggota</title>
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
              <h6 class="h2 text-white d-inline-block mb-0">Pinjaman Anggota</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pinjaman Anggota</a></li>
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
                  <h3 class="mb-0">Pinjaman Anggota Koperasi </h3>
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

                
              </div>
            </div>
           
            <!-- table -->
            <?php
            // Include config file
            include "../../login/config/config.php";

            // Attempt select query execution
            $sql = "SELECT pinjaman.*, user.* FROM pinjaman, user WHERE pinjaman.ID_USER = user.ID_USER";
            $result = mysqli_query($conn, $sql) or die($mysqli_error);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table align-items-center table-flush'>";
                echo "<thead class='thead-light'>";
                echo "<tr>";

                echo "<th>Id</th>";
                echo "<th>Nama</th>";
                echo "<th>Jumlah Pinjaman</th>";
                echo "<th>Bunga</th>";
                echo "<th>Lama Cicilan</th>";
                echo "<th>Angsuran</th>";
                echo "<th>Tanggal Jatuh Tempo</th>";
                echo "<th>Action</th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['ID_USER'] . "</td>";
                  echo "<td>" . $row['NAMA'] . "</td>";
                  echo "<td>" . number_format($row['JUMLAH_PINJAMAN'], 0, '', '.') . "</td>";
                  echo "<td>" . number_format($row['BUNGA'], 0, '', '.') . "</td>";
                  echo "<td>" . $row['LAMA_CICILAN'] . " Bulan </td>";
                  echo "<td>" . number_format($row['ANGSURAN'], 0, '', '.') . "</td>";
                  echo "<td>" . $row['TANGGAL_JATUH_TEMPO'] . "</td>";



            ?>

                  <td>
                    <button class="btn btn-success m1" type="button" data-toggle="modal" data-target="#squarespaceModal" data-idpinjaman="<?php echo $row['ID_PINJAMAN'] ?>" data-iduser="<?php echo $row['ID_USER'] ?>" data-nama="<?php echo $row['NAMA'] ?>" data-jumlahpinjam="<?php echo $row['JUMLAH_PINJAMAN'] ?>" data-bunga="<?php echo $row['BUNGA'] ?>" data-lamacicilan="<?php echo $row['LAMA_CICILAN'] ?>" data-angsuran="<?php echo $row['ANGSURAN'] ?>" data-tanggal="<?php echo $row['TANGGAL_JATUH_TEMPO'] ?>">Edit</button>

                    <form action="../config-pinjaman/delete.php" class="d-inline" method="post">
                      <button type="submit" name="id" value="<?php echo $row['ID_PINJAMAN']  ?>" class="btn btn-danger m-1">Delete</button>
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
      <footer class="footer pt-0">
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
        var id_pinjaman = button.data("idpinjaman");
        var id_user = button.data("iduser");
        var nama = button.data("nama");
        var jumlahpinjam = button.data("jumlahpinjam");
        var bunga = button.data("bunga");
        var lamacicilan = button.data("lamacicilan");
        var angsuran = button.data("angsuran");
        var tanggal = button.data("tanggal");


        var modal = $(this);

        modal.find("#nama").val(id_user);
        modal.find("#jumlah_pinjaman").val(jumlahpinjam);
        modal.find("#bungaan").val(bunga);
        modal.find("#cicilan").val(lamacicilan);
        modal.find("#angsuran").val(angsuran);
        modal.find("#tanggal").val(tanggal);

        if (id_user !== undefined) {
          modal.find("#formpinjam").attr("action", `../config-pinjaman/edit.php?id_pinjaman=${id_pinjaman}`);
        } else {
          modal.find("#formpinjam").attr("action", `../config-pinjaman/tambah.php`);
        }
      });
    })
  </script>

  <script>
    $(document).ready(function() {
      if ($("#jumlah_pinjaman").value !== null) {
        $("#cicilan").on("change", function() {
          var valJumlahPinjaman = $("#jumlah_pinjaman").val();
          var valCicilan = $(this).children("option:selected").val();
          valJumlahPinjaman = valJumlahPinjaman.replace(/\./g, '');
          var nilaiCicilan = valCicilan.split(" ")[0];

          var bunga = ((valJumlahPinjaman * 12) / 100);
          var total_pinjaman = valJumlahPinjaman + bunga;

          var cicilan_pokok = valJumlahPinjaman / nilaiCicilan;
          var angsuran_bulan = (cicilan_pokok + (bunga / 12));

          var dot_jp = valJumlahPinjaman.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
          

          $("#jumlah_pinjaman").val(dot_jp);
          $("#angsuran").val(angsuran_bulan);
          $("#bungaan").val(bunga);


        });


      }
    });
  </script>
</body>

</html>