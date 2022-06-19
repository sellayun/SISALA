@extends('dashboard')
@section('content')
        <!-- Page Heading -->
<div style="background-color: #E5EaF0;">
  <div style="background-color: #D5E3F3; border-radius: 0 0 50px 50px; padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; height: 150px;">
    <div style="width: 100%;">
      <ul class="progressbar">
        <li class="active"></li>
        <li class="active"></li>
      </ul>
    </div>
    <h3 style="color: #112D54; text-align: center;"><b>Tambah Simulasi</b></h3>
  </div>
<!-- Content Row -->
<div class="row" style="padding-left: 1.5rem; padding-right: 1.5rem; margin-top: 30px;">
            

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Upload Data Simulasi</h6>
                </div>
                <div class="card-body">
                  @if(session()->has('alert'))
                    <div class="alert alert-danger">
                        {{ session()->get('alert') }}
                    </div>
                  @endif
                  <form action="/simulasi/ubah/upload" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">Data A</label>
                    <div class="custom-file">
                                                <input type="file" name='file' class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">{{$data_a}}</label>
                                            </div>
                  </div>
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">Data B</label>
                    <div class="custom-file">
                                                <input type="file" name='file2' class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">{{$data_b}}</label>
                                            </div>
                  </div>
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">Data C</label>
                    <div class="custom-file">
                                                <input type="file" name='file3' class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">{{$data_c}}</label>
                                            </div>
                  </div>
                  <div class="form-group" style="margin: 0 300px;">
                    <label for="inputEmail4">Data D</label>
                    <div class="custom-file">
                                                <input type="file" name='file4' class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">{{$data_d}}</label>
                                            </div>
                  </div>
                    <br>
                    <input type="hidden" name='id' class="custom-file-input" id="inputGroupFile01" value='{{$id}}' required>
                    <div class="text-center"> 
                      <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endsection