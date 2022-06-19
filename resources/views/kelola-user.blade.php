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
<div style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">
  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="border-radius: 15px;">
    <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
      <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Kelola User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <!-- <table id="exampletable" class="table table-striped table-bordered" style="width:100%"> -->
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>NIM</th>
              <th>Phone</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>NIM</th>
              <th>Phone</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($data as $result)
            <tr>
              <td>{{ $number = $number + 1 }}</td>
              <td>{{ $result->nama }}</td>
              <td>{{ $result->email }}</td>
              <td>{{ $result->nim }}</td>
              <td>{{ $result->phone }}</td>
              <td>
                @if ($result->status == 1)
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#disable{{ $result->id }}" style="width: 80px;">
                  <!-- <i class="fas fa-fw fa-power-off"></i> -->
                  Disable
                </button>
                @else
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#enable{{ $result->id }}" style="width: 80px;">
                  <!-- <i class="fas fa-fw fa-power-off"></i> -->
                  Enable
                </button>
                @endif
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-primary btn-sm" href="/profil/user/{{ $result->id }}" style="width: 80px;">
                  <!-- <i class="fas fa-fw fa-edit"></i> -->
                  Ubah
                </a>

                <!-- Modal -->
                <div class="modal fade" id="disable{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                      </div>
                      <div class="modal-body" style="text-align: center;">
                        Apakah anda yakin menonaktifkan (disable) user?
                      </div>
                      <div class="modal-footer" style="margin: auto;">
                        <a href="/user/disable/{{ $result->id }}/{{ $result->status }}" class="btn btn-success" style="width: 80px;">Ya</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 80px;">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="enable{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                      </div>
                      <div class="modal-body" style="text-align: center;">
                        Apakah anda yakin mengaktifkan (enable) user?
                      </div>
                      <div class="modal-footer" style="margin: auto;">
                        <a href="/user/disable/{{ $result->id }}/{{ $result->status }}" class="btn btn-success" style="width: 80px;">Ya</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 80px;">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <!-- <div class="modal fade" id="exampleModal{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="/profil/mahasiswa" method="POST">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{ csrf_field() }}
                          <img src="{{ asset('data_file/'.$result->foto) }}" class="mx-auto d-block" style="width:35%">
                          <br>
                          @if(Session::has('level') == 'Admin')
                                      <div class="alert alert-danger">
                                      <p>{{ Session::get('level')}}</p>
                                      </div>
                                      @endif
                          <div class="form-group">
                            <lable>Nama Lengkap</lable>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" value="{{ $result->nama }}" required>
                          </div>
                          <div class="form-group">
                            <lable>Email</lable>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email" value="{{ $result->email }}" required>
                          </div>
                          <div class="form-group">
                            <lable>NIM</lable>
                            <input type="text" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan NIM" value="{{ $result->nim }}" required>
                          </div>
                          <div class="form-group">
                            <lable>Phone</lable>
                            <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Phone" value="{{ $result->phone }}" required>
                          </div>
                          <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $result->id }}">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-arrow-left"></i>Kembali</button>
                          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i>Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $result->id }}" style="width: 80px;">
                  <!-- <i class="fas fa-fw fa-trash"></i> -->
                  Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapus{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                      </div>
                      <div class="modal-body" style="text-align: center;">
                        Apakah anda yakin menghapus user?
                      </div>
                      <div class="modal-footer" style="margin: auto;">
                        <a href="/user/hapus/{{ $result->id }}" class="btn btn-success" style="width: 80px;">Ya</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 80px;">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection