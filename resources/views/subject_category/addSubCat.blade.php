@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ثبت دسته بندی مضامین</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">مضامین</a></li>
			<li class="breadcrumb-item active">ثبت دسته بندی مضامین</li>
		</ol>
		<div class="box box-block bg-white">
			<h5>فورم ثبت دسته بندی مضامین</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->
			@include('layouts.errors')
			<form method="post" action="{{ route('saveSubjectCat') }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label>نام دسته بندی</label>
							<input type="text" name="name" class="form-control">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
				</div>

				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label>توضیحات</label>
							<textarea class="form-control" name="description" rows="10"></textarea>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>

				</div>

				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<label>عکس</label>
				        <input type="file" name="photo" id="input-file-now" class="dropify" />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
				</div>


				<br>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-primary mb-0-25 waves-effect waves-light">
							<i class="ti-loop"></i>
							<span>لغو</span>
						</button>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
				</div>
			</form>

		</div>

		<!-- category list -->
		<div class="box box-block bg-white">
			<h5 class="mb-1">لیست دسته بندی مضامین</h5>
			<table class="table table-striped table-bordered dataTable" id="table-1">
				<thead>
					<tr>
						<th>شماره</th>
						<th>نام دسته بندی</th>
						<th>توضیحات</th>
						<th>عکس</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($sc_list as $sc)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $sc->name }}</td>
							<td>{{ $sc->description }}</td>
							<td>
								<img src="{{ asset('UploadedImages') . '/' .$sc->photo }}" width="50">
							</td>
							<td>
								<a href="{{ url('deleteSubCat'). '/' .$sc->id }}" title="حذف" onclick='return confirm("آیا مظمیین استید که جذف شود.")'>
									<i class="ti ti-trash text-danger"></i>
								</a>&nbsp;&nbsp;
								<a href="{{ url('editSubjectCategory').'/' .$sc->id }}" title="ویرایش">
									<i class="ti ti-pencil-alt"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>شماره</th>
						<th>نام دسته بندی</th>
						<th>توضیحات</th>
						<th>عکس</th>
						<th></th>						
					</tr>
				</tfoot>
			</table>
		</div>

	</div>
</div>


@endsection