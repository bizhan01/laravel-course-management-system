@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <div class="box box-block bg-white">
          <table class="table table-bordered table-striped" id="table-3">
            <thead>
               <tr>
                  <th data-priority="1">آی دی (ID)</th>
                  <th data-priority="1">عکس</th>
                  <th data-priority="3">اسم کامل</th>
                  <th data-priority="1">وظیفه</th>
                  <th data-priority="6">عملیات</th>
               </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
               <tr>
                  <td>{{ $employee->id }}</td>
                  <td><a href="/UploadedImages/{{$employee->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$employee->profileImage}}" alt="" /> </a></td>
                  <td>{{$employee->fullName}}</td>
                  <td>{{$employee->position}}</td>
                  <td style="display: flex !important; flex-direction: row !important; justify-content: center !important;">
                    <a href="{{ URL::to('employees/' . $employee->id . '/edit') }}" ><li class="fa fa-edit text-success"></li></a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url('employeeDetails').'/'.$employee->id}}" ><li class="fa fa-info text-info"></li></a>&nbsp;&nbsp;&nbsp;
										<a href="{{url('deleteEmployee').'/' .$employee->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
											<i class="ti ti-trash text-danger"></i>
										</a>
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
