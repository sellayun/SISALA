@extends('layout')
@section('content')
<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">dashboard</h1>
          </div> -->
          <div style="background-color: #E5EaF0;">
            <div style="background-color: #D5E3F3; border-radius: 0 0 50px 50px; padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">
              @if(session()->has('sukses'))
              <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('sukses') }}
              </div>
              @elseif(session()->has('gagal'))
              <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('gagal') }}
              </div>
              @endif

              @if ($level == "Mahasiswa" and (!isset($nim, $phone) or $foto == "avatar.png"))
              <div class="alert alert-warning" style="text-align: center;">
                Fitur simulasi akan muncul ketika, data sudah lengkap!
              </div>
              @else
              <div class="alert alert-success" style="text-align: center;">
                Selamat Datang, {{ $nama }} ({{ $level }})
              </div>
              @endif

              <div class="row">
                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                  <div class="card border-left-warning shadow h-20 py-2" style="margin: 0 70px;">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          @if ($level == "Admin")
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User Enable</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktif }}</div>
                          @else
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User Enable</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktif }}</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                  <div class="card border-left-warning shadow h-20 py-2" style="margin: 0 70px;">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          @if ($level == "Admin")
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah }}</div>
                          @else
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah }}</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                  <div class="card border-left-warning shadow h-20 py-2" style="margin: 0 70px;">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          @if ($level == "Admin")
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disable User</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nonaktif }}</div>
                          @else
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disable User</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nonaktif }}</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800" style="padding-left: 50px; padding-top: 50px;">Jumlah User Setiap Bulan</h1>
</div>

            <!-- Content Row -->
            <div class="row" style="padding-left: 1.5rem; padding-right: 1.5rem;">
              <!-- Pending Requests Card Example -->
              <div class="col-xl-12 col-md-12 mb-12">
                <div id="chartdiv"></div>
              </div>
            </div>
          </div>
          @endsection
