@extends('dashboard')
@section('content')
        <!-- Page Heading -->
<div style="background-color: #E5EaF0;">
  <div style="background-color: #D5E3F3; border-radius: 0 0 50px 50px; padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; height: 150px;">
    <!-- <div style="width: 100%;">
      <ul class="progressbar">
        <li class="active"></li>
        <li class="active"></li>
      </ul>
    </div> -->
    <h3 style="color: #112D54; text-align: center;"><b>Tambah Simulasi</b></h3>
  </div>
<!-- Content Row -->
<div class="row" style="padding-left: 1.5rem; padding-right: 1.5rem; margin-top: 30px;">
            

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Data Simulasi</h6>
                </div>
                <div class="card-body">
                  @if(session()->has('alert'))
                    <div class="alert alert-danger">
                        {{ session()->get('alert') }}
                    </div>
                  @endif
                  <form action="/simulasi/upload" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                          <input type="text" name="judul" class="form-control" id="inputPassword" placeholder="Judul" style="width: 450px;" required>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Data Elevasi (Boundary)</label>
                        <div class="col-sm-10">
                          <input type="file" name="file" class="form-control-file" id="inputPassword" style="width: 450px;" required>
                    <small id="emailHelp" class="form-text text-muted"><a href="/data_simulasi/data_el_291.dat" download>Unduh</a> contoh data elevasi</small>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Data Kecepatan Arus U (Boundary)</label>
                        <div class="col-sm-10">
                          <input type="file" name="file2" class="form-control-file" id="inputPassword" style="width: 450px;" required>
                    <small id="emailHelp" class="form-text text-muted"><a href="/data_simulasi/data_u_291.dat" download>Unduh</a> contoh data kecepatan arus u (boudary)</small>
                        </div>
                      </div><div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Data Kecepatan Arus V (Boundary)</label>
                        <div class="col-sm-10">
                          <input type="file" name="file3" class="form-control-file" id="inputPassword" style="width: 450px;" required>
                    <small id="emailHelp" class="form-text text-muted"><a href="/data_simulasi/data_v_291.dat" download>Unduh</a> contoh data kecepatan arus v (boudary)</small>
                        </div>
                      </div><div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Data Koordinat (Input Dasar)</label>
                        <div class="col-sm-10">
                          <input type="file" name="file4" class="form-control-file" id="inputPassword" style="width: 450px;" required>
                    <small id="emailHelp" class="form-text text-muted"><a href="/data_simulasi/input_data_291.dat" download>Unduh</a> contoh data koordinat (input dasar)</small>
                        </div>
                      </div>
                  <!-- <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">data_el_291</label>
                    <div class="custom-file">
                      <input type="file" name='file' class="custom-file-input" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">data_u_291</label>
                    <div class="custom-file">
                              <input type="file" name='file2' class="custom-file-input" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                  </div>
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">data_v_291</label>
                    <div class="custom-file">
                              <input type="file" name='file3' class="custom-file-input" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                  </div>
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">input_data_291</label>
                    <div class="custom-file">
                              <input type="file" name='file4' class="custom-file-input" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                  </div> -->
                    <br>
                    <div class="text-center"> 
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endsection
