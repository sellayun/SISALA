@extends('dashboard')
@section('content')
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
<div class="row" style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">

  <!-- Content Column -->
  <div class="col-lg-12 mb-12">

    <!-- Project Card Example -->
    <div class="card shadow mb-4" style="border-radius: 15px;">
      <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tentang</h6>
      </div>
      <div class="card-body" style="padding: 120px 300px;">
          <!-- <img src="{{ asset('data_file/'.$gambar) }}" class="mx-auto d-block" style="width:35%">
          <br>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div> -->
          <div class="form-group">
            <lable>Judul</lable>
            <input type="text" name="judul" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukkan Judul" value="{{$judul}}" required>
          </div>
          <div class="form-group">
            <lable>Deskripsi</lable>
            <textarea class="form-control" name="deskripsi" id="exampleInputPassword2" required>{{$deskripsi}}</textarea>
          </div>
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
        <form action="/dashboard/aksi" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
            <input type="text" name="judul" id="demo1" hidden="">
            <textarea id="demo2" name="deskripsi" hidden=""></textarea>
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