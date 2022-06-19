@extends('dashboard')
@section('content')
<!-- Page Heading -->
<div class="row" style="padding-left: 1.5rem; padding-right: 1.5rem; margin-top: 30px;">

  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="padding-left: 1.5rem; padding-right: 1.5rem; margin-top: 30px;">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Simulasi Hasil</h6>
      </div>
      <div class="card-body">
        <h6 class="m-0 font-weight-bold text-primary">Status : Selesai</h6>
        <h6 class="m-0 font-weight-bold text-primary" style="padding-bottom: 10px;">Judul : {{$judul}}</h6>
        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-file-pdf"></i>Cetak Laporan</button>
        <!-- <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-file-excel"></i>Export Excel</button> -->
        <a href="/simulasi/export_excel" class="btn btn-success" target="_blank"><i class="fas fa-fw fa-file-excel"></i>Export Excel</a>
        <!-- <input type="submit" value="Submit" name="submit" /> -->
        <!-- <div class="table-responsive pt-sm-2">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php
              // foreach (file('C:/Users/Naufal/Desktop/New folder/'.$email.'.out') as $line) {
              //   echo "<tr><td>" . str_replace(' ', '</td><td>', $line) . '</td></tr>';
              // }

              // while (!feof($file)){   
              //   $data = fgets($file); 
              //   echo "<tr><td>" . str_replace(' ','</td><td>',$data) . '</td></tr>';
              // }
              ?>
            </tbody>
          </table>
        </div> -->
      </div>
    </div>
  </div>
</div>


<?php
// if(isset($_POST['submit'])){
//   $handle = fopen(file(storage_path('cek.txt')), "r");
//   $lines = [];
//   if (($handle = fopen(file(storage_path('cek.txt')), "r")) !== FALSE) {
//       while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
//           $lines[] = $data;
//       }
//       fclose($handle);
//   }
//   $fp = fopen('filesimulasi.csv', 'w');
//   foreach ($lines as $line) {
//       fputcsv($fp, $line);
//   }
//   fclose($fp);
// }
?>

@endsection