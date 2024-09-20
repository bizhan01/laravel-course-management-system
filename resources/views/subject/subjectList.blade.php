@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست مضامین</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">مضامین</a></li>
			<li class="breadcrumb-item active">لیست مضامین</li>
		</ol>

		@include('layouts.errors')
		
		<div class="box box-block bg-white">
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-3">
					<thead>
						<tr>
							<th>#</th>
							<th>نام مضمون</th>
							<th>دسته بندی</th>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($subjects as $subject)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$subject->name}}</td>
								<td>{{$subject->category}}</td>

								<td style="display: flex; flex-direction: row; justify-content: center;">
									<a href="{{ url('deleteSubject').'/'.$subject->id }}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
										<i class="ti ti-trash text-danger"></i>
									</a>
									&nbsp;&nbsp;&nbsp;
									<a href="{{ url('editSubject').'/' .$subject->id }}" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>&nbsp;&nbsp;&nbsp;
									<a href="{{ url('subjectDetails').'/' .$subject->id }}" title="جزییات">
										<i class="ti-info-alt text-info"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>نام مضمون</th>
							<th>دسته بندی</th>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		
		
	</div>
</div>

@endsection