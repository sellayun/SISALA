@extends('layout')
@section('content')
<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">dashboard</h1>
          </div> -->
          <div style="background-color: #E5EaF0;">
            <div style="background-color: #D5E3F3; height: 50px;">

            </div>
            <div style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">
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
            </div>

            <!-- Content Row -->
            <div class="row" style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">

              <!-- Content Column -->
              <div class="col-lg-12 mb-12">

                <!-- Project Card Example -->
                <div class="card shadow mb-4" style="border-radius: 15px;">
                  <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                  </div>
                  <div class="card-body">
                  <p><b>{{$nama}}</b></p>
                  <p>{{$nim}}</p>
                  <p>Phone : {{$phone}}</p>
                  <p>Email : {{$email}}</p>
                  </div>
                </div>

              </div>
            </div>

            <!-- Content Row -->
            <div class="row" style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">

              <!-- Content Column -->
              <div class="col-lg-12 mb-12">

                <!-- Project Card Example -->
                <div class="card shadow mb-4" style="border-radius: 15px;">
                  <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
                    <h6 class="m-0 font-weight-bold text-primary">Data Simulasi</h6>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <!-- Pending Requests Card Example -->
                      <div class="col-xl-4 col-md-4 mb-4">
                        <div class="card shadow h-20 py-2" style="margin: 0 70px; background-color: #E8D742;">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Proses Perhitungan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $proses }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Pending Requests Card Example -->
                      <div class="col-xl-4 col-md-4 mb-4">
                        <div class="card shadow h-20 py-2" style="margin: 0 70px; background-color: #3ABE47;">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $selesai }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Pending Requests Card Example -->
                      <div class="col-xl-4 col-md-4 mb-4">
                        <div class="card shadow h-20 py-2" style="margin: 0 70px; background-color: #97C3F9;">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Berkas Hasil Simulasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hapus }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Content Row -->
            <!-- <div class="row" style="padding-left: 1.5rem; padding-right: 1.5rem;"> -->
              <!-- Pending Requests Card Example -->
              <!-- <div class="col-xl-12 col-md-12 mb-12">
                <div id="chartdiv"></div>
              </div>
            </div> -->
          </div>
          @endsection
