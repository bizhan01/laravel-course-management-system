@extends('layouts.master')
@section('content')
<!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
     <div class="col-lg-3"></div>
      <div class="col-lg-6 box box-block bg-white">
        <h4>ارتباط با کارمندان</h4>
      <div class="row row-sm">
        @foreach($employees as $employee)
        <div class="col-md-12">
          <div class="box box-block bg-white">
            <div class="row">
              <div class="col-md-4 col-sm-4 text-center">
                <img class="img-fluid b-a-radius-circle" src="UploadedImages/{{$employee->profileImage}}" alt="" style="width: 150px !important; height: 150px !important;">
              </div>
              <div class="col-md-8 col-sm-8">
                <h5>{{$employee->fullName}}</h5>
                <span class="tag tag-info" style="font-size: 15px">{{$employee->position}}</span>
                <!-- <p> -->
                <address>ایمیل: {{$employee->email}}<br>
                  <div class="input-group">
                  <span class="input-group-addon">تلفن:</span>
                  <input type="button" class="form-control" value="{{$employee->phone1}}" style="direction: ltr">
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">تلفن:</span>
                  <input type="button" class="form-control" value="{{$employee->phone2}}" style="direction: ltr">
                  </div>
                </address>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      </div>
    </div>
</div>
@endsection
