<?php 
include "../layout/header.php";
include "koneksi.php";
?>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beasiswa WP</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/1.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Administrator</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="alternatif_kriteria.php">Data Alternatif dan Kriteria</a></li>
                      <li><a href="bobot.php">Data Bobot dan Kriteria</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Perhitungan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="perhitungan.php">Hasil</a></li>
                    </ul>
                  </li>
                
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/1.png" alt="">Administrator
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- ISI PAGE -->
        <!-- page content -->
        <div class="right_col" role="main">
        <!-- page content -->
          <div class="">
            <div class="col" style="display: inline-block;">



            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bobot Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Bobot Kriteria</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Bobot</h3>
                    
                    </div>
                    <!-- Tabel alternatif -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#addModal"><i class="far fa-plus-square"></i> Tambah Data</button>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bobot Kriteria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="kode">Alternatif</label>
                                                <select name="id_alternatif" class="form-control">
                                                    <?php
                                                    include 'koneksi.php';
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM alternatif");
                                                    while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                        <option value="<?= $data['id_alter'] ?>"><?= $data['alternatif']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="C1">C1 Nilai IPK</label>
                                                <input type="text" class="form-control" name="c1" id="C1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="C2">C2 Semester</label>
                                                <input type="number" min="1" max="8" class="form-control" name="c2" id="C2" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="C3">C3 Pekerjaan Orangtua</label>
                                                <input type="number" min="1" max="10" class="form-control" name="c3" id="C3" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="C4">C4 Jumlah Penghasilan Orangtua</label>
                                                <input type="number" min="1" max="100" class="form-control" name="c4" id="C4" required>
                                            </div>
                                            <div class="form-group">
                                                <label>C5 Jumlah Saudara Kandung</label>
                                                <select name="c5" class="form-control" required>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="add_bobot" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- tutup modal -->
                        <!-- tabel data -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="20px">No.</th>
                                    <th>Alternatif</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th width="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM bobot a JOIN alternatif b 
                                                                    ON a.id_alter=b.id_alter");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['alternatif']; ?></td>
                                        <td><?= $data['c1']; ?></td>
                                        <td><?= $data['c2']; ?></td>
                                        <td><?= $data['c3']; ?></td>
                                        <td><?= $data['c4']; ?></td>
                                        <td><?= $data['c5']; ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-warning sm" data-toggle="modal" data-target="#editModal<?= $data['id_bobot']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                            <button type="button" class="btn btn-danger sm" data-toggle="modal" data-target="#deleteModal<?= $data['id_bobot']; ?>"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal edit -->
                                    <div class="modal fade" id="editModal<?= $data['id_bobot']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Bobot Kriteria</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="id">ID Pembobotan</label>
                                                            <input type="text" class="form-control" name="idbobot" id="id" value="<?= $data['id_bobot']; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kode">Alternatif</label>
                                                            <input type="text" class="form-control" id="kode" value="<?= $data['alternatif']; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="C1">C1 Nilai IPK</label>
                                                            <input type="text" class="form-control" name="c1" id="C1" value="<?= $data['c1']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="C2">C2 Semester (1-8)</label>
                                                            <input type="number" min="1s" max="8" class="form-control" name="c2" id="C2" value="<?= $data['c2']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="C3">C3 Pekerjaan Orangtua</label>
                                                            <input type="number" min="1" max="100" class="form-control" name="c3" id="C3" value="<?= $data['c3']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="C4">C4 Jumlah Penghasilan Orangtua</label>
                                                            <input type="number" min="1" max="100" class="form-control" name="c4" id="C4" value="<?= $data['c4']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>C5 Jumlah Saudara</label>
                                                            <select name="c5" class="form-control" required>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_bobot" class="btn btn-primary">Edit Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tutup modal -->
                                    <!-- Modal delete -->
                                    <div class="modal fade" id="deleteModal<?= $data['id_bobot']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="idbobot" value="<?= $data['id_bobot']; ?>">
                                                        <p>Apakah anda Yakin akan menghapus id(<?= $data['id_bobot']; ?>) ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete_id" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tutup modal -->
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>

<?php
// tambah data tabel bobot
if (isset($_POST['add_bobot'])) {
    $id = $_POST['id_alternatif'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];

    // mengacek apakah alternatif sudah di ada atau belum
    $sql3 = mysqli_query($koneksi, "SELECT id_alter FROM bobot WHERE id_alter=$id");
    $cek = mysqli_num_rows($sql3);
    if ($cek == 0) {
        mysqli_query($koneksi, "INSERT INTO bobot VALUES(NULL,$id,'$c1','$c2','$c3','$c4','$c5')");
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script>
                alert('data berhasil di tambahkan');
                document.location.href = 'bobot.php';
                </script>";
        } else {
            echo "<script>
                alert('data gagal di tambahkan');
                document.location.href = 'bobot.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('data alternatif sudah di ada, silahkan pilih data lain !!!');
                document.location.href = 'bobot.php';
                </script>";
    }
}

// edit data bobot
if (isset($_POST['edit_bobot'])) {
    $idbobot = $_POST['idbobot'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];

    mysqli_query($koneksi, "UPDATE bobot SET c1=$c1, c2=$c2, c3=$c3, c4=$c4, c5=$c5 WHERE id_bobot=$idbobot");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
            alert('data berhasil di edit');
            document.location.href = 'bobot.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal di edit');
            document.location.href = 'bobot.php';
            </script>";
    }
}

// fungsi delete tabel alternatif
if (isset($_POST['delete_id'])) {
    $id = $_POST['idbobot'];
    mysqli_query($koneksi, "DELETE FROM bobot WHERE id_bobot=$id");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
            alert('data berhasil di hapus');
            document.location.href = 'bobot.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal di hapus');
            document.location.href = 'bobot.php';
            </script>";
    }
}

?>

    <?php
    include "../layout/footer.php";
    ?>
	
  </body>
</html>