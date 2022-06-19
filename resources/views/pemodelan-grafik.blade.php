@extends('dashboard')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pemodelan Grafik</h1>
          </div>
<!-- Content Row -->
<div class="row">

<!-- Content Column -->
<div class="col-lg-12 mb-4">

  <!-- Project Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pemodelan Grafik</h6>
    </div>
    <div class="card-body">
      <table width="100%">
        <tbody>
          <tr>
            <td>Judul :</td>
            <td></td>
          </tr>
          <tr>
            <td>Waktu Mulai :</td>
            <td></td>
          </tr>
          <tr>
            <td>Hari :</td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <br>
      <div class="chart-area">
        <canvas id="myAreaChart"></canvas>
      </div>
      <hr>
      Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
    </div>
  </div>

</div>
</div>
          @endsection