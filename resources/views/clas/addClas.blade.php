@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ایجاد صنف جدید</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">صنف ها</a></li>
			<li class="breadcrumb-item active">ایجاد صنف جدید</li>
		</ol>

		@include('layouts.errors')

		<div class="box box-block bg-white">
			<h5>فورم ایجاد صنف جدید</h5>
			<p class="font-90 text-muted mb-1">فیلد هایی که <span class="text-danger">*</span> دارند پر نمودن شان حتمی است.</p>

			<form method="post" action="{{ route('saveClas') }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>نام صنف <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control" required value="{{old('name')}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>مضمون<span class="text-danger">*</span></label>
							<select name="subject" class="form-control no-padding" required>
								@foreach($subjects as $subject)
									<option value="{{ $subject->id }}">{{ $subject->name }}</option>
								@endforeach
							</select>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>نام استاد <span class="text-danger">*</span></label>
							<select name="teacher" class="form-control no-padding" required>
								@foreach($teachers as $teacher)
									<option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
								@endforeach
							</select>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>ساعت شروع<span class="text-danger">*</span></label>
									<input type="time" name="start_time" class="form-control" value="{{old('start_time')}}">
									<span class="font-90 text-muted"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ساعت ختم<span class="text-danger">*</span></label>
									<input type="time" name="end_time" class="form-control" value="{{old('end_time')}}">
									<span class="font-90 text-muted"></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>سال<span class="text-danger">*</span></label>
									<input type="number" name="year" class="form-control"
									value="{{date('Y')-621}}" min="1300">
									<span class="font-90 text-muted"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>ماه<span class="text-danger">*</span></label>
									<?php $month = [
										'1'  => 'حمل',
										'2'  => 'ثور',
										'3'  => 'جوزا',
										'4'  => 'سرصان',
										'5'  => 'اسد',
										'6'  => 'سنبله',
										'7'  => 'میزان',
										'8'  => 'عقرب',
										'9'  => 'قوس',
										'10' => 'جدی',
										'11' => 'دلو',
										'12' => 'حوت'
									]; ?>
									<select class="no-padding form-control" name="month">
										@for($i = 1; $i <= 12; $i++)
											<option value="{{$month[$i]}}"> {{ $month[$i]}} </option>
										@endfor
									</select>
									<span class="font-90 text-muted"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>روز<span class="text-danger">*</span></label>
									<select name="day" class="form-control" class="no-padding">
										@for($i = 1; $i <= 31; $i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									<span class="font-90 text-muted"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php
								$status = [
									'0' => 'شروع نشده',
									'1' => 'درحال جریان',
									'2' => 'خاتمه یافته'
								];
							?>
							<label>وضعیت<span class="text-danger">*</span></label>
							<select name="status" class="form-control no-padding" required>
								@foreach($status as $key => $value)
									<option value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>فیس</label>
							<input type="number" name="fee" min="0" class="form-control">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<div class="form-group">
							<label>تخفیف</label>
							<input type="number" name="discount" min="0" class="form-control">
							<span class="font-90 text-muted pull-left" dir="ltr" style="text-align: left;"></span>
						</div>
					</div> -->
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>توضیحات صنف (اختیاری)</label>
				        <textarea class="form-control" name="description" rows="4"></textarea>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-primary mb-0-25 waves-effect waves-light">
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
