@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ثبت استاد جدید</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">اساتید</a></li>
			<li class="breadcrumb-item active">ثبت استاد جدید</li>
		</ol>
		<div class="box box-block bg-white">
			<h5>فورم ثبت نام استاد:</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->

			@include('layouts.errors')

			<form method="post" action="{{route('saveTeacher')}}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>اسم کامل <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="name" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>اسم پدر <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="f_name" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>تلفن <span style="color: red">*</span></label>
							<input type="text" placeholder="" data-mask="(099) 999-9999" class="form-control" dir="ltr" name="phone" required>
							<span class="font-90 text-muted pull-left" dir="ltr" style="text-align: left;">(0xx) xxx-xxxx</span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>ایمیل آدرس</label>
							<input type="email" class="form-control" name="email" >
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>آدرس اصلی <span style="color: red">*</span></label>
							<input type="address" class="form-control" name="main_address" placeholder="ولایت/ولسوالی/ناحیه یا قریه" required>
							<span class="font-90 text-muted pull-left" ></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>آدرس فعلی <span style="color: red">*</span></label>
							<input type="address" class="form-control" name="current_address" placeholder="ولایت/ولسوالی/ناحیه یا قریه" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>نمبر تذکره <span style="color: red">*</span></label>
							<input type="address" class="form-control" name="tazkira_no" required>
							<span class="font-90 text-muted pull-left" ></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label>عکس <span style="color: red">*</span></label>
				        <input type="file" accept="image/*" name="photo" id="input-file-now" class="dropify" required/>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label>کاپی تذکره <span style="color: red">*</span></label>
				        <input type="file" name="tazkira" accept="image/*" id="input-file-now" class="dropify" required/>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label>ضمانت خط <span style="color: red">*</span></label>
				        <input type="file" name="warranty" accept="image/*" id="input-file-now" class="dropify" required/>
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
