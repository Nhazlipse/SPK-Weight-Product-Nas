<?php 
include "../layout/header.php";
include "koneksi.php";

$sql = mysqli_query($koneksi, "SELECT * FROM alternatif");
$sql2 = mysqli_query($koneksi, "SELECT * FROM bobot");
$jumlahdata_alternatif = mysqli_num_rows($sql);
$jumlahdata_bobot = mysqli_num_rows($sql2);
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
              <a href="dashboard.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beasiswa WP</span></a>
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
                      <li><a href="dashboard.php">Dashboard</a></li>
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
            <!-- /menu footer buttons -->
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
          
          <!-- top tiles -->
          <br><br>
          <br>
          <h3 class="p-2" align="center">APLIKASI SISTEM PENDUKUNG KEPUTUSAN MENGGUNAKAN METODE WP BERBASIS WEB </h3>
          <h4 align="center">PEMILIHAN PENERIMAAN BEASISWA MAHASISWA UNISKA</h4>
          <br><br>

          <!-- page content -->
          <div class="">
            <div class="col" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count"><?= $jumlahdata_alternatif; ?></div>
                  <h3>Jumlah Alternatif</h3>
                  <p> <a href="alternatif_kriteria.php" class="small-box-footer">Lihat Data<i></i></a></P>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?= $jumlahdata_bobot; ?></div>
                  <h3>Data Bobot dan Kriteria</h3>
                  <p> <a href="bobot.php" class="small-box-footer">Lihat Data<i></i></a></P>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">Hasil</div>
                  <h3>Perhitungan WP</h3>
                  <p> <a href="perhitungan.php" class="small-box-footer">Lihat Data<i></i></a></P>
                </div>
              </div>
            </div>
          </div>
          <!-- /top tiles -->

          
          <div class="col-md-15 col-sm-25  ">
    <div class="x_panel">
        <div class="card">
            <div class="card-header">
                <h3 align="center" class="card-title">Graph Hasil Perhitungan</h3>
                
            </div>
            <div class="card-body">
                <div>
                    <canvas id="chartAkhir"></canvas>
                </div>
            <?php
                $jml_kriteria = jml_kriteria();
                $jml_bobot = jumlah_tabel_bobot();
                $get_bobot = get_bobot();
                $costbenefit = get_costbenefit();
                $get_alternatif = get_alternatif();
                end($get_alternatif);
                $alter = key($get_alternatif) + 1;
                $get_bobotkriteria = bobot_setiap_kriteria();
                $tbl_kepentingan = 0;
                $tbl_bobot = 0;

                for ($i = 0; $i < $jml_kriteria; $i++) {
                    $tbl_kepentingan = $tbl_kepentingan + $get_bobot[$i];
                }
                for ($i = 0; $i < $jml_kriteria; $i++) {
                    $wj[$i] = ($get_bobot[$i] / $tbl_kepentingan);
                }
                for ($i = 0; $i < $jml_kriteria; $i++) {
                    if ($costbenefit[$i] == "cost") {
                        $resultwj[$i] = (-1) * $wj[$i];
                    } else {
                        $resultwj[$i] = $wj[$i];
                    }
                }
                for ($j = 0; $j < $jml_bobot; $j++) {
                    for ($i = 0; $i < $jml_kriteria; $i++) {
                        $si[$j][$i] = pow(($get_bobotkriteria[$j][$i]), $resultwj[$i]);
                    }
                    $resultsi[$j] = $si[$j][0] * $si[$j][1] * $si[$j][2] * $si[$j][3] * $si[$j][4];
                }
                $totalsi = 0;
                for ($i = 0; $i < $jml_bobot; $i++) {
                    $totalsi = $totalsi + $resultsi[$i];
                }
                for ($i = 0; $i < $jml_bobot; $i++) {
                    $resultvi[$i] = round($resultsi[$i] / $totalsi, 6);
                }
                ?>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Fungsi perhitungan -->
<?php
// memanggil fungsi cost dan benefit pada tabel kriteria
function get_costbenefit()
{
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM kriteria");
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        @$cost_benefit[$i] = $row['jenis'];
        $i++;
    }
    return $cost_benefit;
}

// menghitung jumlah isi pada tabel kriteria
function jml_kriteria()
{
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM kriteria");
    $result = mysqli_num_rows($query);
    return $result;
}

// Mendapatkan nilai kolom bobot pada tabel kriteria
function get_bobot()
{
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM kriteria");
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        @$bobot[$i] = $row['bobot'];
        $i++;
    }
    return $bobot;
}

// menghitung jumlah isi pada tabel bobot
function jumlah_tabel_bobot()
{
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM bobot");
    $result = mysqli_num_rows($query);
    return $result;
}

// mendapatkan nilai c1 c2 c3 c4 c5 pada tabel bobot
function bobot_setiap_kriteria()
{
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM bobot");
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        @$bobot_kriteria[$i][0] = $row['c1'];
        @$bobot_kriteria[$i][1] = $row['c2'];
        @$bobot_kriteria[$i][2] = $row['c3'];
        @$bobot_kriteria[$i][3] = $row['c4'];
        @$bobot_kriteria[$i][4] = $row['c5'];
        $i++;
    }
    return $bobot_kriteria;
}

// mendapatkan nama alternatif dar tabel bobot
function get_alternatif()
{
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM bobot a JOIN alternatif b 
                                            ON a.id_alter=b.id_alter");
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        @$col_alternatif[$i][0] = $row['alternatif'];
        @$col_alternatif[$i][1] = $row['code'];
        $i++;
    }
    return $col_alternatif;
}

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('chartAkhir').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [
                <?php
                for ($i = 0; $i < $jml_bobot; $i++) {
                    echo "'" . $get_alternatif[$i][0] . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Data Vi',
                backgroundColor: 'rgb(167, 206, 130)',
                borderColor: 'rgb(193, 221, 167)',
                data: [
                    <?php
                    for ($i = 0; $i < $jml_bobot; $i++) {
                        echo $resultvi[$i] . ',';
                    }
                    ?>
                ]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
            </div>
        </div>
    </div>
</div>



                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          SPK - Beasiswa Mahasiswa UNISKA - WP</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php
    include "../layout/footer.php";
    ?>
	
  </body>
</html>
