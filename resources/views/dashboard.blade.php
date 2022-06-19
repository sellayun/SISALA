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

  <style type="text/css">
   /* .hover-item {
      background-color: #112D54;
    }
    .hover-item:hover {
      background-color: #112D54;
    }*/
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

    .progressbar {
      counter-reset: step;
    }

    .progressbar li {
      list-style-type: none;
      float: left;
      width: 50%;
      position: relative;
      text-align: center;
    }

    .progressbar li:before {
      content: counter(step);
      counter-increment: step;
      width: 40px;
      height: 30px;
      line-height: 30px;
      border: 1px solid #ddd;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 7px;
      border-color: #112D54;
    }

    .progressbar li:after {
      content: '';
      position: absolute;
      width: 90%;
      height: 1px;
      background-color: #ddd;
      top: 15px;
      left: -45%;
    }

    .progressbar li:first-child:after {
      content: none;
    }

    .progressbar li.active {
      color: white;
    }

    .progressbar li.active:before {
      border-color: #112D54;
      background-color: #112D54;
    }

    .progressbar li.active + li:after {
      background-color: #112D54;
    }
  </style>
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
          <!-- <div style="background-color: white; background-size: 2px 10px; margin-left: 8px;">
            <div style="padding-left: 20px;">
              <div>
                <div style="background-color: white; width: 7px; height: 7px; margin: 0 0 0 -22px;"></div>
                <a href="#" style="color: white; text-decoration: none;">Ubah Profil</a>
              </div>
              <div>
                <div style="background-color: white; width: 7px; height: 7px; margin: 0 0 0 -22px;"></div>
                <a href="#" style="color: white; text-decoration: none;">Ubah Password</a>
              </div>
            </div>
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
            <a class="collapse-item" href="/profil/mahasiswa" style="color: white;">&#9900; Ubah Profil</a>
            <a class="collapse-item" href="/profil/password" style="color: white;">&#9900; Ubah Password</a>
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

  <script type="text/javascript">
    // function showloading() {
    //   $("#loading").fadeIn("slow");
    // }

    // function hideloading() {
    //   $("#loading").fadeOut("slow");
    // }

    // function showpage(link) {
    //   $.ajax({
    //     type: "GET",
    //     url: link,
    //     beforeSend: showloading(),
    //     success: function(msg) {
    //       $("#indexmain").hide();
    //       $("#indexmain").html(msg).show("slow");
    //       hideloading();
    //     },
    //     error: function(msg) {
    //       $("#indexmain").html("<center><font color='#ff0000'>Ajax loading error, please try again.</font></center>").show("slow");
    //       hideloading();
    //     }
    //     //, complete: hideloading()
    //   });
    // }
  </script>

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

  <script>
  function myFunction() {
    var x1 = document.getElementById("exampleInputPassword1").value;
    document.getElementById("demo1").value = x1;
    var x2 = document.getElementById("exampleInputPassword2").value;
    document.getElementById("demo2").value = x2;
    var x3 = document.getElementById("exampleInputPassword3").value;
    document.getElementById("demo3").value = x3;
    var x4 = document.getElementById("exampleInputPassword4").value;
    document.getElementById("demo4").value = x4;
    var x5 = document.getElementById("exampleInputPassword5").value;
    document.getElementById("demo5").value = x5;
    var x6 = document.getElementById("exampleInputPassword6").value;
    document.getElementById("demo6").value = x6;
    var x7 = document.getElementById("exampleInputPassword7").value;
    document.getElementById("demo7").value = x7;
    var x8 = document.getElementById("exampleInputPassword8").value;
    document.getElementById("demo8").value = x8;
    var x9 = document.getElementById("exampleInputPassword9").value;
    document.getElementById("demo9").value = x9;
  }

  document.getElementById("file").onchange = function() {
      document.getElementById("form").submit();
  }
  </script>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    // var Tawk_API = Tawk_API || {},
    //   Tawk_LoadStart = new Date();
    // (function() {
    //   var s1 = document.createElement("script"),
    //     s0 = document.getElementsByTagName("script")[0];
    //   s1.async = true;
    //   s1.src = 'https://embed.tawk.to/5f1ab17a7258dc118beed8d4/default';
    //   s1.charset = 'UTF-8';
    //   s1.setAttribute('crossorigin', '*');
    //   s0.parentNode.insertBefore(s1, s0);
    // })();
  </script>
  <!--End of Tawk.to Script-->

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->


</body>

</html>
