@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست استادان</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">استادان</a></li>
			<li class="breadcrumb-item active">لیست استادان</li>
		</ol>

		@include('layouts.errors')

		<div class="box box-block bg-white">
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-1">
					<thead>
						<tr>
							<th>شماره</th>
							<th>اسم </th>
							<th>اسم پدر</th>
							<th>تلفن</th>
							<th>ایمیل</th>
							<th>آدرس اصلی</th>
							<th>آدرس فعلی</th>
							<th>تذکره</th>
							<th>عکس</th>
							<th>تذکره</th>
							<th>ضمانت خط</th>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($teachers as $teacher)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $teacher->full_name }}</td>
								<td>{{ $teacher->father_name }}</td>
								<td>{{ $teacher->phone }}</td>
								<td>{{ $teacher->email }}</td>
								<td>{{ $teacher->main_address }}</td>
								<td>{{ $teacher->current_address }}</td>
								<td>{{ $teacher->tazkira_no}}</td>
								<td style="width: 60px !important; padding: 2px;">
									<a href="{{ asset('UploadedImages/teacher') .'/' .$teacher->photo }}"><img src="{{ asset('UploadedImages/teacher') .'/' .$teacher->photo }}" style="width: 100%; "></a>
								</td>
								<td style="width: 60px !important; padding: 2px;">
									<a href="{{ asset('UploadedImages/teacher') .'/' .$teacher->tazkira }}"><img src="{{ asset('UploadedImages/teacher') .'/' .$teacher->tazkira }}" style="width: 100%; "></a>
								</td>
								<td style="width: 60px !important; padding: 2px;">
									<a href="{{ asset('UploadedImages/teacher') .'/' .$teacher->warranty }}"><img src="{{ asset('UploadedImages/teacher') .'/' .$teacher->warranty }}" style="width: 100%; "></a>
								</td>
								<td style="display: flex; flex-direction: row; justify-content: center;">
									<a href="{{url('deleteTeacher').'/' .$teacher->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
										<i class="ti ti-trash text-danger"></i>
									</a>
									&nbsp;&nbsp;&nbsp;
									<a href="{{url('editTeacher').'/'.$teacher->id}}" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>


	</div>
</div>

@endsection
