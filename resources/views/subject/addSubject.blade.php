@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ثبت مضمون جدید</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">مضامین</a></li>
			<li class="breadcrumb-item active">ثبت مضمون جدید</li>
		</ol>

		@include('layouts.errors')
		
		<div class="box box-block bg-white">
			<h5>فورم ثبت مضمون</h5>
			<p class="font-90 text-muted mb-1">فیلد هایی که <span class="text-danger">*</span> دارند پر نمودن شان حتمی است.</p>

			<form method="post" action="{{ route('saveSubject') }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>نام مضمون <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>دسته بندی<span class="text-danger">*</span></label>
							<select name="category" class="form-control no-padding" required>
								@foreach($sb_cat as $sbc)
									<option value="{{ $sbc->id }}">{{ $sbc->name }}</option>
								@endforeach
							</select>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label>توضیحات مضمون (اختیاری)</label>
				        <textarea class="form-control" name="description" rows="11"></textarea>
					</div>
					<div class="col-md-6">
						<label>عکس</label>
				        <input type="file" name="photo" id="input-file-now" class="dropify" />
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