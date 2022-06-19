@extends('dashboard')
@section('content')
<!-- Page Heading -->
<div style="background-color: #CAD1DA; width: 100%; height: 60px;"></div>
@if(session()->has('sukses'))
<div class="alert alert-success" style="margin: 30px 1.5rem 0 1.5rem; text-align: center;">
  {{ session()->get('sukses') }}
</div>
@elseif(session()->has('gagal'))
<div class="alert alert-danger" style="margin: 30px 1.5rem 0 1.5rem; text-align: center;">
  {{ session()->get('gagal') }}
</div>
@endif
<!-- Content Row -->
<div class="row" style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">

  <!-- Content Column -->
  <div class="col-lg-12 mb-12">

    <!-- Project Card Example -->
    <div class="card shadow mb-4" style="border-radius: 15px;">
      <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Profil</h6>
      </div>
      <div class="card-body" style="padding: 120px 300px;">
                  <img src="/data_file/{{$foto2 }}" class="mx-auto d-block rounded-circle" alt="Cinque Terre" width="150" height="150">
                  <br>
                  <form action="/profil/user" id="form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <input type="text" name="nama" value="{{$nama2}}" hidden="">
                      <input type="email" name="email" value="{{$email2}}" hidden="">
                      <input type="text" name="nim" value="{{$nim2}}" hidden="">
                      <input type="number" name="phone" value="{{$phone2}}" hidden="">
                    <input type="hidden" name="id" value="{{$id2}}" hidden="">
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="file">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                  </form>
                  <div class="form-group">
                    <lable>Nama Lengkap</lable>
                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" value="{{$nama2}}" required>
                  </div>
                  <div class="form-group">
                    <lable>Email</lable>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword2" aria-describedby="emailHelp" placeholder="Masukkan Email" value="{{$email2}}" readonly>
                  </div>
                  <div class="form-group">
                    <lable>NIM</lable>
                    <input type="text" name="nim" class="form-control" id="exampleInputPassword3" aria-describedby="emailHelp" placeholder="Masukkan NIM" value="{{$nim2}}" required>
                  </div>
                  <div class="form-group">
                    <lable>Phone</lable>
                    <input type="number" name="phone" class="form-control" id="exampleInputPassword4" aria-describedby="emailHelp" placeholder="Masukkan Phone" value="{{$phone2}}" required>
                  </div>
                  <input type="text" name="id" value="{{$id2}}" hidden="">
        <button type="button" class="btn btn-primary" onclick="myFunction()" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-fw fa-edit"></i>Simpan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                  Apakah anda yakin untuk menyimpan perubahan?
                </div>
                <div class="modal-footer" style="margin: auto;">
        <form action="/profil/user" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <input type="file" name="file" hidden="">
                    <input type="text" name="nama" id="demo1" hidden="">
                    <input type="email" name="email" id="demo2" hidden="">
                    <input type="text" name="nim" id="demo3" hidden="">
                    <input type="number" name="phone" id="demo4" hidden="">
                  <input type="hidden" name="id" value="{{$id2}}" hidden="">
                  <button type="submit" class="btn btn-success" style="width: 100px;">SIMPAN</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100px;">BATAL</button>
              </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection