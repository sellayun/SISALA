@extends('dashboard')
@section('content')
<form action="/simulasi/tambah" method="POST">
{{ csrf_field() }}
<!-- Page Heading -->
<div style="background-color: #E5EaF0;">
  <div style="background-color: #D5E3F3; border-radius: 0 0 50px 50px; padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; height: 150px;">
    <!-- <div>
      <div style="background-color: #112D54; color: white; border-radius: 7px 7px 7px 7px; width: 40px; height: 30px; float: left; margin-left: 40%;">
        1
      </div>
      <div style="border-radius: 7px 7px 7px 7px; width: 40px; height: 30px; border-color: black; border-style: solid; margin-right: 40%; float: right;">
        2
      </div>
    </div>
    <h3 style="padding: 40px 0 15px 0; color: #112D54;"><b>Tambah Simulasi</b></h3> -->
    <div style="width: 100%;">
      <ul class="progressbar">
        <li class="active"></li>
        <li></li>
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
      <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tahap 1/4</h6>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Judul</label>
          <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Problem Number</label>
          <select class="custom-select" name="problemnumber" id="inputGroupSelect02" required>
                <option selected>Pilih...</option>
                <option value="1">1 (Seamount)</option>
                <option value="2">2 (Conservation Box)</option>
                <option value="3">3 (IC from file)</option>
              </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Mode</label>
          <select class="custom-select" name="mode" id="inputGroupSelect02" required>
                <option selected>Pilih...</option>
                <option value="2">2 (2-D calculation)</option>
              </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Advection Scheme</label>
          <select class="custom-select" name="advectionscheme" id="inputGroupSelect02" required>
                <option selected>Pilih...</option>
                <option value="1">1 (Centred scheme, as originally provide in POM)</option>
                <option value="2">2 (Smolarkiewicz iterative upstream scheme)</option>
              </select>
        </div>
      </div>  
    </div>
  </div>

  <!-- Project Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tahap 2/4</h6>
    </div>
    <div class="card-body">  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Number of Iterations</label>
        <select class="custom-select" name="numberofiterations" id="inputGroupSelect02" required>
                <option selected>Pilih...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Smoothing Parameter</label>
        <input type="text" name="smoothingparameter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
      </div>
    </div>
    </div>
  </div>

  <!-- Project Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tahap 3/4</h6>
    </div>
    <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Number Read</label>
        <select class="custom-select" name="numberread" id="inputGroupSelect02" required>
                <option selected>Pilih...</option>
                <option value="0">0 (no restart input file)</option>
                <option value="1">1 (restart input file)</option>
              </select>
      </div>
      <div class="form-group col-md-6">
      </div>
    </div> 
    </div>
  </div>

  <!-- Project Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Tahap 4/4</h6>
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Time Start</label>
          <input type="date" name="timestart" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">iskp</label>
          <input type="text" name="iskp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Days</label>
          <select class="custom-select" name="days" id="inputGroupSelect02" required>
                  <option selected>Pilih...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">jskp</label>
          <input type="text" name="jskp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">prtd1</label>
          <input type="text" name="prtd1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Logical for inertial ramp</label>
          <select class="custom-select" name="logicalforinertialramp" id="inputGroupSelect02" required>
                  <option selected>Pilih...</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">prtd2</label>
          <input type="text" name="prtd2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">z0b</label>
          <input type="text" name="z0b" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Switch</label>
          <input type="text" name="switch" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
        </div>
      </div> 
    </div>
  </div>

<!-- </div>

<div class="col-lg-6 mb-4"> -->

  <div class="text-center"> 
    <button type="submit" class="btn btn-primary btn-lg">Simpan & Lanjutkan</button>
  </div>

</div>
</div>
</form>
</div>
          @endsection