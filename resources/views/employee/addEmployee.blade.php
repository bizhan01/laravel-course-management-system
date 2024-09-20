@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
				<!-- ُSuccess Flash Message -->
					@if($success = session('success'))
					<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
							<div>{{$success}}</div>
					</div>
					@endif
        <center> <h4>ثبت کارمند جدید</h4> </center>
        <form method="POST" action="/employees" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-group">
                <h6 style="margin-right: 15px">معلومات شخصی</h6>
               <div class="col-md-4 ">
                 <label  for="Field of Study" style="color:black">اسم کامل </label>
                 <input type="text"  name="fullName" class="form-control" placeholder="اسم کامل" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">وظیفه</label>
								 <select name="position" class="form-control" required>
								 			<option value=" ">----------------</option>
								 			<option>گارد</option>
								 			<option>آشپز</option>
								 			<option>صفاکار</option>
								 			<option>مدیر نشرات</option>
								 			<option>سایر</option>
								 </select>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">تاریخ تولد</label>
                 <input type="date"  name="dob" class="form-control"  required>
               </div>
            </div>

            <div class="row form-group">

               <div class="col-md-4" >
                 <label  for="Field of Study" style="color:black">تلفن </label>
                 <input type="text" name="phone1" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">تلفن</label>
                <input type="text" name="phone2" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" >
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">ایمیل آدرس</label>
                 <input type="text"  name="email" class="form-control" placeholder="someone@domain.com">
               </div>
            </div>

            <div class="row form-group">
                <h6 style="margin-right: 15px">سکونت اصلی</h6>
               <div class="col-md-4">
                 <label  for="Field of Study" style="color:black">ولایت </label>
                 <input type="text"  name="province1" class="form-control" placeholder="ولایت" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">ولسوالی</label>
                 <input type="text"  name="district1" class="form-control" placeholder="ولسوالی" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">ناحیه / قریه</label>
                 <input type="text"  name="region1" class="form-control" placeholder="ناحیه / قریه" required>
               </div>
            </div>

            <div class="row form-group">
                <h6 style="margin-right: 15px">سکونت فعلی</h6>
               <div class="col-md-4 ">
                 <label  for="Field of Study" style="color:black">ولایت </label>
                 <input type="text"  name="province2" class="form-control" placeholder="ولایت" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">ولسوالی</label>
                 <input type="text"  name="district2" class="form-control" placeholder="ولسوالی" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">ناحیه / قریه</label>
                 <input type="text"  name="region2" class="form-control" placeholder="ناحیه / قریه" required>
               </div>
            </div>

            <div class="row form-group">
                <h6 style="margin-right: 15px">اسناد مورد نیاز</h6>
               <div class="col-md-4 ">
                 <label  for="Field of Study" style="color:black">عکس </label>
                 <input type="file" name="profileImage" id="input-file-now" class="dropify" />
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">تذکره</label>
                 <input type="file" name="tazkira" id="input-file-now" class="dropify" />
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">ضمانت خط</label>
                 <input type="file" name="warranty" id="input-file-now" class="dropify" />
               </div>
            </div>

            <div class="row form-group">
               <div class="col-md-4">
                 <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success" />
               </div>
            </div>
            @include('layouts.errors')
          </form>
        </div>
    </div>
</div>
@endsection
