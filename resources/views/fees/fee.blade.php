@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script type="text/javascript">
$(document).ready(function(){

$("#jqueryselect").change(function(){
  	var selectedcolor = $(this).find(':selected').data('dd');
 // var selectedcolor = $('#jqueryselect').data('dd');
    var price = selectedcolor;
    $("#price").val(price);
});

});
</script>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <nav class="navbar navbar-light bg-white b-a mb-2">
      <center><h3>فورم پرداخت فیس</h3></center> <hr>
      <form method="POST" action="{{route('addFee')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row form-group">
          <div class="col-md-6">
            <label  style="color: black">آی دی محصل <span style="color: red">*</span></label>
              <select class="form-control" name="student_id" required  id='selUser' >
  							<option>انتخاب کنید</option>
  							@foreach($students as $student)
  							<option value="{{$student->id}}">{{$student->full_name}} - {{$student->id}}</option>
  							@endforeach
  						</select>
          </div>
          <div class="col-md-6">
            <label  style="color: black">صنف<span style="color: red">*</span></label>
            <select id="jqueryselect" class="form-control" name="class" required>
              <option value=""></option>
              @foreach($classes as $class)
              <option data-dd="{{$class->fee}}" value="{{$class->name}}">{{$class->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
          <div class="row form-group">
            <div class="col-md-4">
              <label  style="color: black">فیس <span style="color: red">*</span></label>
              <input type="number" readonly name="fee" id="price"   value=""  class="form-control"   placeholder="" required>
            </div>
            <div class="col-md-4">
              <label  style="color: black">تخفیف</label>
              <input type="number" min="0" name="discount" value="0"  class="form-control"  placeholder="تخفیف" required>
            </div>
            <div class="col-md-4">
              <label  style="color: black">رسید<span style="color: red">*</span></label>
              <input type="number"  name="paid" value=""  class="form-control"  placeholder="فیس" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6">
              <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
            </div>
         </div>
        @include('layouts.errors')
      </form>
    </nav>
  </div>
</div>

<!--List View  -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <h4 class="mb-1">آخرین مورد ثبت شده</h4>
      <table class="table table-striped  table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ</th>
            <th>آی دی </th>
            <th>اسم</th>
            <th>اسم پدر</th>
            <th>صنف</th>
            <th>فیس</th>
            <th>تخفیف</th>
            <th>قابل پرداخت</th>
            <th>رسید</th>
            <th>باقیات</th>
            <th>پرنت</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($fees as $fee)
          <tr>
            <td>{{$fee->created_at}}</td>
            <td>{{$fee->student_id}}</td>
            <td>{{$fee->full_name}}</td>
            <td>{{$fee->father_name}}</td>
            <td>{{$fee->class}}</td>
            <td>{{$fee->fee}}</td>
            <td>{{$fee->discount}}</td>
            <td>{{$total = $fee->fee - $fee->discount}}</td>
            <td>{{$fee->paid}}</td>
            <td style="direction: ltr; text-align: right; color: red">{{$rest = $total  - $fee->paid}}</td>
            <td>
              <a class="text-primary" href="printFee/{{ $fee->id }}"><i class="fa fa-print btn btn-rounded btn-primary"></i></a>
            </td>
            <td>
              <a class="text-success" href="editFee/{{ $fee->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
              <a class="text-danger" href="deleteFee/{{ $fee->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Script -->
 <script type="text/javascript" src="{{ asset('../jquery-3.2.1.min.js') }}"></script>
 <script>
 $(document).ready(function(){

		 // Initialize select2
		 $("#selUser").select2();

		 // Read selected option
		 $('#but_read').click(function(){
				 var username = $('#selUser option:selected').text();
				 var userid = $('#selUser').val();

				 $('#result').html("id : " + userid + ", name : " + username);
		 });
 });
 </script>


@endsection
