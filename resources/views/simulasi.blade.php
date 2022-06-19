@extends('dashboard')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800" style="padding-left: 50px; padding-top: 50px;">Data Simulasi</h1>
</div>
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

  <div class="col-lg-12 mb-12">
<!-- DataTales Example -->
<div class="card shadow mb-4" style="border-radius: 15px;">
  <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
    <h6 class="m-0 font-weight-bold text-primary">Simulasi</h6>
  </div>
  <a class="btn btn-success " href="/simulasi/upload"> <i class="fas fa-fw fa-plus-circle"></i>Tambah Simulasi</a>
  <br>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Status</th>
		        <th>Hasil Simulasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $result)
            @if($result->hapus == 0)
            <tr>
              <td>{{ $number = $number+1 }}</td>
              <td>{{ $result->judul }}</td>
              @foreach((array)$simulasi as $result2)
              <?php
                if ($result->id_simulasi === (string)$result2->id) {
                  // var_dump($result2);
                  if ($result2->status === "created") {
                    echo '<td>';
                    echo '<p class="text-center" style="background-color: #E8D742; color: white;">Proses</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil</a> <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil Elevasi</a> <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil Arus</a> <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil Kecepatan Arus</a>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
                    echo '</td>';
                  } else if ($result2->status === "done" or strlen($result2->last_output) === 1) {
                    echo '<td>';
                    echo '<p class="btn-success text-center">Selesai</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="/data_shared/'.$result->workdir.'/Hasil.out" class="btn btn-primary btn-sm" download><i class="fas fa-fw fa-download"></i> Hasil</a> <a href="/data_shared/'.$result->workdir.'/Hasil_e.txt" class="btn btn-primary btn-sm" download><i class="fas fa-fw fa-download"></i> Hasil Elevasi</a> <a href="/data_shared/'.$result->workdir.'/Hasil_u.txt" class="btn btn-primary btn-sm" download><i class="fas fa-fw fa-download"></i> Hasil Arus</a> <a href="/data_shared/'.$result->workdir.'/Hasil_v.txt" class="btn btn-primary btn-sm" download><i class="fas fa-fw fa-download"></i> Hasil Kecepatan Arus</a>';
                    echo '</td>';
                    echo '<td>';
                    echo '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#batal'.$result->id.'" style="width: 80px;"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
                    echo '</td>';
                  } else {
                    echo '<td>';
                    echo '<p class="text-center" style="background-color: #E8D742; color: white;">Proses</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil</a> <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil Elevasi</a> <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil Arus</a> <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-download"></i> Hasil Kecepatan Arus</a>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
                    echo '</td>';
                  }
                }
              ?>
                <!-- <a href="/simulasi/ubah/{{ $result->id }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i>Ubah</a> -->

                <!-- Modal -->
                <div class="modal fade" id="batal{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                      </div>
                      <div class="modal-body" style="text-align: center;">
                        Apakah anda yakin menghapus, Simulasi {{ $result->judul }}?
                      </div>
                      <div class="modal-footer" style="margin: auto;">
                        <a href="/simulasi/hapus/{{ $result->id }}" class="btn btn-danger" style="width: 80px;">Ya</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 80px;">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              @endforeach
            </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
@endsection
