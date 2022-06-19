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

  <div class="col-lg-12 mb-12">

    <!-- Illustrations -->
    <div class="card shadow mb-4" style="border-radius: 15px;">
      <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Ubah Password</h6>
      </div>
      <div class="card-body" style="padding: 120px 300px;">
          <div class="form-group">
            <lable>Password Lama</lable>
            <input type="password" name="passwordlama" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password Lama" required>
          </div>
          <div class="form-group">
            <lable>Password Baru</lable>
            <input type="password" name="passwordbaru" class="form-control" id="exampleInputPassword2" placeholder="Masukkan Password Baru" required>
          </div>
          <div class="form-group">
            <lable>Konfirmasi Password</lable>
            <input type="password" name="konfirmasipassword" class="form-control" id="exampleInputPassword3" placeholder="Masukkan Konfirmasi Password" required>
          </div>
          <input type="text" name="id" value="{{$id}}" hidden="">
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
        <form action="/password/update" method="POST">
          {{ csrf_field() }}
                  <input type="password" name="passwordlama" id="demo1" hidden="">
                  <input type="password" name="passwordbaru" id="demo2" hidden="">
                  <input type="password" name="konfirmasipassword" id="demo3" hidden="">
                  <input type="text" name="id" value="{{$id}}" hidden="">
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