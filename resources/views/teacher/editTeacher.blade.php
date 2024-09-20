@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ویرایش معلومات استاد</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">اساتید</a></li>
			<li class="breadcrumb-item active">ویرایش معلومات استاد</li>
		</ol>
		<div class="box box-block bg-white">
			<h5>ویرایش معلومات استاد</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->

			@include('layouts.errors')

			<form method="post" action="{{route('updateTeacher')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$teacher['id']}}">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>اسم کامل<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="name" value="{{$teacher['full_name']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>اسم پدر<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="f_name" value="{{$teacher['father_name']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>تلفن <span style="color: red">*</span></label>
							<input type="text" placeholder="" data-mask="(099) 999-9999" class="form-control" dir="ltr" name="phone" value="{{$teacher['phone']}}" required>
							<span class="font-90 text-muted pull-left" dir="ltr" style="text-align: left;">(0xx) xxx-xxxx</span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>ایمیل آدرس</label>
							<input type="email" class="form-control" name="email" value="{{$teacher['email']}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>آدرس اصلی <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="main_address" value="{{$teacher['main_address']}}" required>
							<span class="font-90 text-muted pull-left" ></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>آدرس فعلی <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="current_address" value="{{$teacher['current_address']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>نمبر تذکره <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="tazkira_no" value="{{$teacher['tazkira_no']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<label>عکس <span style="color: red">*</span></label>
							<input type="hidden" name="photo" value="{{$teacher['photo']}}">
            	<input type="file" name="photo" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/teacher/{{$teacher['photo']}}" />
					</div>
					<div class="col-md-4">
						<label>تذکره<span style="color: red">*</span></label>
							<input type="hidden" name="tazkira" value="{{$teacher['tazkira']}}">
            	<input type="file" name="tazkira" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/teacher/{{$teacher['tazkira']}}" />
					</div>
					<div class="col-md-4">
						<label>ضمانت خط<span style="color: red">*</span></label>
							<input type="hidden" name="warranty" value="{{$teacher['warranty']}}">
            	<input type="file" name="warranty" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/teacher/{{$teacher['warranty']}}" />
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-danger mb-0-25 waves-effect waves-light">
							<i class="ti-loop"></i>
							<span>لغو</span>
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>


@endsection
