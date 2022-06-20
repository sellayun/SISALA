<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> arusku - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/home/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <link hre="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

  <!-- Styles -->
  <style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    .samping {
      float: left;
      list-style-type: none;
      border-left: 2px solid #8793A4;
      padding: 0 20px;
      margin-left: -30px;
    }
    .tengah {
      background-color: #8793A4;
      margin: 10px 0 0 -24px;
      width: 7px;
      height: 7px;
      border-radius: 50%;
    }
    .kanan {
      color: #8793A4;
      float: right;
      margin-top: -15px;
      width: 120px;
    }
  </style>

  <!-- Resources -->
  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

  <!-- Chart code -->
  <script>
    am4core.ready(function() {

      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end


      var chart = am4core.create("chartdiv", am4charts.XYChart);

      chart.data = [
        <?php
            foreach ($grafik as $value) {
          ?>
        {
        "country": <?php
          if ($value->bulan == "1") {
            echo json_encode("Januari");
          } else if ($value->bulan == "2") {
            echo json_encode("Februari");
          } else if ($value->bulan == "3") {
            echo json_encode("Maret");
          } else if ($value->bulan == "4") {
            echo json_encode("April");
          } else if ($value->bulan == "5") {
            echo json_encode("Mei");
          } else if ($value->bulan == "6") {
            echo json_encode("Juni");
          } else if ($value->bulan == "7") {
            echo json_encode("Juli");
          } else if ($value->bulan == "8") {
            echo json_encode("Agustus");
          } else if ($value->bulan == "9") {
            echo json_encode("September");
          } else if ($value->bulan == "10") {
            echo json_encode("Oktober");
          } else if ($value->bulan == "11") {
            echo json_encode("November");
          } else {
            echo json_encode("Desember");
          }
          ?>,
        "visits": <?php echo $value->jumlah;?>
      },
      <?php } ?>
      ];

      // Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
  </script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #112D54;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <span style="background-color: #458FF6; border-radius: 50%; width: 20px; height: 20px; color: white; margin-right: 15px; margin-right: 0;">A</span>
        <div class="sidebar-brand-text mx-3">arusku</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <div style="padding-top: 10px;">
        <img src="/data_file/{{ $foto }}" class="mx-auto d-block rounded-circle" alt="Cinque Terre" width="85" height="85">
        <!-- <h3 style="color: white; text-align: center;">{{$nama}}</h3> -->
        <h6 style="color: white; text-align: center; font-size: 13px; padding-top: 5px;">{{$nama}}</h6>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Main Menu
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      @if ($level == "Admin")
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Profil</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <!-- <div class="py-2 collapse-inner rounded">
            <a class="collapse-item" href="/profil/admin" style="color: white; background-color: #112D54;">&#9900; Ubah Profil</a>
            <a class="collapse-item" href="/profil/password" style="color: white; background-color: #112D54;">&#9900; Ubah Password</a>
          </div> -->
          <ul>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/profil/admin" class="kanan">Ubah Profil</a>
            </li>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/profil/password" class="kanan">Ubah Password</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Kelola Beranda</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <!-- <div class="py-2 collapse-inner rounded">
            <a class="collapse-item" href="/kelola/tentang" style="color: white; background-color: #112D54;">&#9900; Tentang</a>
            <a class="collapse-item" href="/kelola/kontak" style="color: white; background-color: #112D54;">&#9900; Kontak</a>
          </div> -->
          <ul>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/kelola/tentang" class="kanan">Tentang</a>
            </li>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/kelola/kontak" class="kanan">Kontak</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="/kelola/user">
          <i class="fas fa-fw fa-users-cog"></i>
          <span>Kelola User</span></a>
      </li>
      @elseif ($level == "Mahasiswa" and isset($nim) and isset($phone) and $foto != "avatar.png")
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Profil</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <!-- <div class="py-2 collapse-inner rounded">
            <a class="collapse-item" href="/profil/mahasiswa" style="color: white; background-color: #112D54;">&#9900; Ubah Profil</a>
            <a class="collapse-item" href="/profil/password" style="color: white; background-color: #112D54;">&#9900; Ubah Password</a>
          </div> -->
          <ul>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/profil/mahasiswa" class="kanan">Ubah Profil</a>
            </li>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/profil/password" class="kanan">Ubah Password</a>
            </li>
          </ul>
        </div>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-table"></i>
          <span>Simulasi</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <!-- <div class="py-2 collapse-inner rounded">
            <a class="collapse-item" href="/kelola/tentang" style="color: white; background-color: #112D54;">&#9900; Tentang</a>
            <a class="collapse-item" href="/kelola/kontak" style="color: white; background-color: #112D54;">&#9900; Kontak</a>
          </div> -->
          <ul>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/simulasi" class="kanan">Kelola Simulasi</a>
            </li>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/simulasi/upload" class="kanan" style="font-size: 15px;">Tambah Simulasi</a>
            </li>
          </ul>
        </div>
      </li>

      @else
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Profil</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <!-- <div class="py-2 collapse-inner rounded">
            <a class="collapse-item" href="/profil/mahasiswa" style="color: white; background-color: #112D54;">&#9900; Ubah Profil</a>
            <a class="collapse-item" href="/profil/password" style="color: white; background-color: #112D54;">&#9900; Ubah Password</a>
          </div> -->
          <ul>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/profil/mahasiswa" class="kanan">Ubah Profil</a>
            </li>
            <li class="samping">
              <div class="tengah"></div>
              <a href="/profil/password" class="kanan">Ubah Password</a>
            </li>
          </ul>
        </div>
      </li>
      @endif
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal2">
          <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                  Apakah anda yakin keluar?
                </div>
                <div class="modal-footer" style="margin: auto;">
        <form action="/logout">
          {{ csrf_field() }}
                  <button type="submit" class="btn btn-success" style="width: 80px;">YA</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 80px;">TIDAK</button>
              </form>
                </div>
            </div>
          </div>
        </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

          </ul>

        </nav> -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="padding-left: 0; padding-right: 0;" id="indexmain">
          @yield('content')
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © 2022 - Arusku</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Siap untuk pergi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/logout">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/home/vendor/jquery/jquery.min.js"></script>
  <script src="/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/home/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/home/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/home/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/home/js/demo/chart-area-demo.js"></script>
  <script src="/home/js/demo/chart-pie-demo.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->

</body>

</html>
