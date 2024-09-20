@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
      <center><h4 class="mb-1">شاگردان که باید فیس شان را پرداخت کنند</h4></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>آی دی</th>
            <th>اسم </th>
            <th>اسم پدر</th>
            <th>صنف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($fees as $fee)
          <tr>
            <td>{{$fee->student_id}}</td>
            <td>{{$fee->full_name}}</td>
            <td>{{$fee->father_name}}</td>
            <td>{{$fee->class}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
