@extends('dashboard')
@section('content')
<form action="/simulasi/ubah/aksi" method="POST">
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
          <input type="text" value="{{$judul}}" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Problem Number</label>
                  <select class="custom-select" value="{{$problem_number}}" name="problemnumber" id="inputGroupSelect02" required>
                    <option @if ($problem_number=="1" ) selected @endif value="1">1 (Seamount)</option>
                    <option @if ($problem_number=="2" ) selected @endif value="2">2 (Conservation Box)</option>
                    <option @if ($problem_number=="3" ) selected @endif value="3">3 (IC from file)</option>
                  </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Mode</label>
          <select class="custom-select" name="mode" id="inputGroupSelect02" required>
                    <option @if ($mode=="2" ) selected @endif value="2">2 (2-D calculation)</option>
                  </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Advection Scheme</label>
          <select class="custom-select" name="advectionscheme" id="inputGroupSelect02" required>
                    <option @if ($advection_scheme=="1" ) selected @endif value="1">1 (Centred scheme, as originally provide in POM)</option>
                    <option @if ($advection_scheme=="2" ) selected @endif value="2">2 (Smolarkiewicz iterative upstream scheme)</option>
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
                    <option @if ($number_of_iterations=="1" ) selected @endif value="1">1</option>
                    <option @if ($number_of_iterations=="2" ) selected @endif value="2">2</option>
                    <option @if ($number_of_iterations=="3" ) selected @endif value="3">3</option>
                    <option @if ($number_of_iterations=="4" ) selected @endif value="4">4</option>
                  </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Smoothing Parameter</label>
        <input type="text" value="{{$smoothing_parameter}}" name="smoothingparameter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
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
                    <option @if ($number_read=="0" ) selected @endif value="0">0 (no restart input file)</option>
                    <option @if ($number_read=="1" ) selected @endif value="1">1 (restart input file)</option>
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
          <input type="date" value="{{$time_start}}" name="timestart" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">iskp</label>
          <input type="text" value="{{$iskp}}" name="iskp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Days</label>
          <select class="custom-select" name="days" id="inputGroupSelect02" required>
                    <option @if ($days=="1" ) selected @endif value="1">1</option>
                    <option @if ($days=="2" ) selected @endif value="2">2</option>
                    <option @if ($days=="3" ) selected @endif value="3">3</option>
                    <option @if ($days=="4" ) selected @endif value="4">4</option>
                    <option @if ($days=="5" ) selected @endif value="5">5</option>
                    <option @if ($days=="6" ) selected @endif value="6">6</option>
                    <option @if ($days=="7" ) selected @endif value="7">7</option>
                    <option @if ($days=="8" ) selected @endif value="8">8</option>
                    <option @if ($days=="9" ) selected @endif value="9">9</option>
                    <option @if ($days=="10" ) selected @endif value="10">10</option>
                    <option @if ($days=="11" ) selected @endif value="11">11</option>
                    <option @if ($days=="12" ) selected @endif value="12">12</option>
                    <option @if ($days=="13" ) selected @endif value="13">13</option>
                    <option @if ($days=="14" ) selected @endif value="14">14</option>
                    <option @if ($days=="15" ) selected @endif value="15">15</option>
                    <option @if ($days=="16" ) selected @endif value="16">16</option>
                    <option @if ($days=="17" ) selected @endif value="17">17</option>
                    <option @if ($days=="18" ) selected @endif value="18">18</option>
                    <option @if ($days=="19" ) selected @endif value="19">19</option>
                    <option @if ($days=="20" ) selected @endif value="20">20</option>
                    <option @if ($days=="21" ) selected @endif value="21">21</option>
                    <option @if ($days=="22" ) selected @endif value="22">22</option>
                    <option @if ($days=="23" ) selected @endif value="23">23</option>
                    <option @if ($days=="24" ) selected @endif value="24">24</option>
                    <option @if ($days=="25" ) selected @endif value="25">25</option>
                    <option @if ($days=="26" ) selected @endif value="26">26</option>
                    <option @if ($days=="27" ) selected @endif value="27">27</option>
                    <option @if ($days=="28" ) selected @endif value="28">28</option>
                    <option @if ($days=="29" ) selected @endif value="29">29</option>
                    <option @if ($days=="30" ) selected @endif value="30">30</option>
                    <option @if ($days=="31" ) selected @endif value="31">31</option>
                  </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">jskp</label>
          <input type="text" value="{{$jskp}}" name="jskp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">prtd1</label>
          <input type="text" value="{{$prtd1}}" name="prtd1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Logical for inertial ramp</label>
          <select class="custom-select" name="logicalforinertialramp" id="inputGroupSelect02" required>
                    <option @if ($mode=="true" ) selected @endif value="true">True</option>
                    <option @if ($mode=="false" ) selected @endif value="false">False</option>
                  </select>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">prtd2</label>
          <input type="text" value="{{$prtd2}}" name="prtd2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">z0b</label>
          <input type="text" value="{{$z0b}}" name="z0b" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Switch</label>
          <input type="text" value="{{$switch}}" name="switch" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
        </div>
      </div> 
    </div>
  </div>

<!-- </div>

<div class="col-lg-6 mb-4"> -->
  <input type="hidden" value="{{$id}}" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>

  <div class="text-center"> 
    <button type="submit" class="btn btn-primary btn-lg">Simpan & Lanjutkan</button>
  </div>

</div>
</div>
</form>
</div>
          @endsection