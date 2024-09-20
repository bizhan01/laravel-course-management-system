@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست شاگردان</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">شاگردان</a></li>
			<li class="breadcrumb-item active">لیست شاگردان</li>
		</ol>

		@include('layouts.errors')
		
		<div class="box box-block bg-white">
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-3">
					<thead>
						<tr>
							<th>#</th>
							<th>نام</th>
							<th>نام پدر</th>
							<th>آی دی(ID)</th>
							<td style="width: 50px !important; ">عکس</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $student->full_name}}</td>
								<td>{{ $student->father_name }}</td>
								<td dir="ltr" style="text-align: center;">{{ $student->id }}</td>
								<td  style="width: 50px !important; padding: 2px;">
									<img src="{{ asset('UploadedImages/student').'/'.$student->photo}}"  style="width: 100% !important; ">
								</td>
								<td style="display: flex; flex-direction: row; justify-content: center;">
									<a href="{{url('deleteStudent').'/' .$student->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
										<i class="ti ti-trash text-danger"></i>
									</a>
									&nbsp;&nbsp;&nbsp;
									<a href="{{url('editStudent').'/' .$student->id}}" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>&nbsp;&nbsp;&nbsp;
									<a href="{{url('studentDetails').'/'.$student->id}}" title="جزییات">
										<i class="ti-info-alt text-info"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>نام</th>
							<th>نام پدر</th>
							<th>آی دی(ID)</th>
							<td style="width: 50px !important; ">عکس</td>
							<td></td>
						</tr>											
					</tfoot>
				</table>
			</div>
		</div>
		
		
	</div>
</div>

@endsection