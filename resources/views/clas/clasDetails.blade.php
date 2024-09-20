@extends('layouts.master')

@section('content')
<div class="content-area pb-1">

	<div class="profile-header mb-1">
		<div class="profile-header-cover img-cover" style="background-image: url({{asset('img/photos-1/class.jpg')}});"></div>
		<div class="profile-header-counters clearfix">
			<div class="container-fluid">
				<div class="float-xs-right">
					<a href="#" class="text-black">
						<h5 class="font-weight-bold" dir="ltr">
							{{date('h:i ', strtotime($clases['end_time']))}}
						</h5>
						<span class="text-muted">تایم ختم</span>
					</a>

				</div>
				<div class="float-xs-right">
					<a href="#" class="text-black">
						<h5 class="font-weight-bold" dir="ltr">
							{{date('h:i ', strtotime($clases['start_time']))}}
						</h5>
						<span class="text-muted">تایم شروع</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<div class="card profile-card">
					<div class="profile-avatar">
						<img src="" alt="">
					</div>
					<center class="card-block">
						<h4 class="mb-0-25">{{ $clases['name'] }}</h4>
						<br>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary btn-rounded waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								وضعیت
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item <?php if ($clases['status'] == 1): ?>
									<?php echo 'active' ?>
								<?php endif ?>" href="#">درحال جریان</a>
								<a class="dropdown-item <?php if ($clases['status'] == 0): ?>
									<?php echo 'active' ?>
								<?php endif ?>" href="#">
									شروع نشده
								</a>
								<a class="dropdown-item <?php if ($clases['status'] == 2): ?>
									<?php echo 'active' ?>
								<?php endif ?>" href="#">
									خاتمه یافته
								</a>
							</div>
						</div>
					</center>

				</div>
				<div class="card">
					<div class="card-header text-uppercase"><b>فیس و تخفیف</b></div>
					<div class="items-list">
						<div class="il-item">
							<a class="text-black">
								<div class="media">
									<div class="media-body">
										<h6 class="media-heading">فیس</h6>
										<span class="text-muted">{{ $clases['fee'] }}</span>
									</div>
								</div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" >
								<div class="media">
									<div class="media-body">
										<h6 class="media-heading">تخفیف</h6>
										<span class="text-muted">{{ $clases['discount'] }}</span>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="box bg-white">
					<ul class="nav nav-4">
						<li class="nav-item" title="استاد">
							<a class="nav-link">
								<i class="ti-user"></i>
								<span>
									@foreach($teacher as $t)
										{{ $t->teacher_name }}
									@endforeach
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-8 col-md-9">
				<!-- <form class="card write-something">
					<textarea placeholder="What's new?"></textarea>
					<div class="card-footer">
						<div class="clearfix">
							<div class="float-xs-left">
								<a href="#" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Attach image"><i class="ti-image"></i></a>
								<a href="#" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Attach video"><i class="ti-video-clapper"></i></a>
								<a href="#" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Attach audio"><i class="ti-music-alt"></i></a>
							</div>
							<div class="float-xs-right">
								<button type="submit" class="btn btn-success btn-rounded">Publish</button>
							</div>
						</div>
					</div>
				</form> -->
				<div class="card mb-0">
					<ul class="nav nav-tabs nav-tabs-2 profile-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#students" role="tab">شاگردان این صنف</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab">Photos</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#addStudent" role="tab">اضافه کردن شاگرد</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="students" role="tabpanel">

							<div class="media stream-item">

								@include('layouts.errors')

								<div class="media-body">
									<div class="stream-body">
										<div class="col-md-12">
											<form method="post" action="{{route('updateStudentInfo')}}">
												@csrf
												<table class="table mb-md-0 table-hover table-striped">
													<thead>
														<tr>
															<th>#</th>
															<th>عکس</th>
															<th>نام</th>
															<th>نام پدر</th>
															<th>آی دی (ID)</th>
															<th>حاضر</th>
															<th>غیر حاضر</th>
															<th>نمره</th>
															<th>وضیعت</th>
															<th colspan="2">جزییات</th>
														</tr>
													</thead>
													<tbody>
														@foreach($students as $std)
															<tr>
																<td scope="row">{{$loop->iteration}}</td>
																<td style="width: 50px !important; padding: 0px;">
																	<img src="{{ asset('UploadedImages/student').'/'.$std->studentPhoto}}" style="width: 100%;">
																</td>
																<td>{{$std->studentName}}</td>
																<td>{{$std->studentFName}}</td>
																<td>{{$std->studentId}}</td>
																<td>
																	<input type="number" min="0" max="31" name="present[]" value="{{$std->present}}"class="form-control edit">
																</td>
																<td>
																	<input type="number" min="0" max="31" name="absent[]" value="{{$std->absent}}" class="form-control edit">
																</td>
																<td>
																	<input type="number" min="0" max="100" name="score[]" value="{{$std->score}}" class="form-control edit" >
																</td>
																<td>
																	<center>
																	@if($std->score >= 50)
																		<span class="btn btn-rounded btn-sm btn-success">کامیاب</span>
																	@elseif($std->score >= 45 && $std->score <= 49)
																		<button class="btn btn-rounded btn-sm btn-warning">چانس دوم</button>
																	@else
																		<span class="btn btn-rounded btn-sm btn-danger">ناکام</button>
																	@endif
																</center>
																</td>
																<!-- <td>
																	<a href="{{url('studentDetails').'/'.$std->id}}" title="جزییات">
																		<i class="ti-info-alt text-info"></i>
																	</a>
																</td> -->
																<td>
																	<a href="{{url('deleteStudentFromClass').'/'.$std->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که {{$std->studentName}} از صنف {{ $clases['name']}} حذف شود؟")'>
																		<i class="ti-trash text-danger"></i>
																	</a>
																</td>
																<input type="hidden" name="ids[]" value="{{$std->studentId}}">
																<input type="hidden" name="class_id" value="{{$clases['id']}}">
															</tr>
														@endforeach
													</tbody>
												</table>
												<br>
												<div class="row btn-save" style="display: none;">
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

											@if(count($students) > 0)
											<div class="row edit-row">
												<div class="col-md-12">
													<button class="btn btn-outline-info mb-0-25 waves-effect waves-light btn-edit">
														<i class="ti-pencil-alt"></i>
														<span>ویرایش</span>
													</button>
												</div>
											</div>
											@endif

										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="tab-pane card-block" id="photos" role="tabpanel">
							<div class="gallery-2 row">
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="g-item">
										<a href="img/photos-1/1.jpg">
											<img src="img/photos-1/1.jpg" alt="">
										</a>
										<div class="g-item-overlay clearfix">
											<div class="float-xs-left">
												<a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-heart mr-0-5"></i>105</a>
											</div>
											<div class="float-xs-right">
												<a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-comment mr-0-5"></i>20</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="g-item">
										<a href="img/photos-1/2.jpg">
											<img src="img/photos-1/2.jpg" alt="">
										</a>
										<div class="g-item-overlay clearfix">
											<div class="float-xs-left">
												<a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-heart mr-0-5"></i>105</a>
											</div>
											<div class="float-xs-right">
												<a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-comment mr-0-5"></i>20</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="g-item">
										<a href="img/photos-1/3.jpg">
											<img src="img/photos-1/3.jpg" alt="">
										</a>
										<div class="g-item-overlay clearfix">
											<div class="float-xs-left">
												<a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-heart mr-0-5"></i>105</a>
											</div>
											<div class="float-xs-right">
												<a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-comment mr-0-5"></i>20</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane card-block" id="addStudent" role="tabpanel">
							<div class="box box-block bg-white">
								<div class="overflow-x-auto">
									<table class="table table-striped table-bordered dataTable" id="table-3">
										<thead>
											<tr>
												<th>نام</th>
												<th>نام پدر</th>
												<th>آی دی(ID)</th>
												<td style="width: 50px !important; ">عکس</td>
												<td></td>
											</tr>
										</thead>
										<tbody>
											@foreach($allStudents as $student)
											<tr>
												<td>{{ $student->full_name}}</td>
												<td>{{ $student->father_name }}</td>
												<td dir="ltr" style="text-align: center;">{{ $student->id }}</td>
												<td  style="width: 50px !important; padding: 2px;">
													<img src="{{ asset('UploadedImages/student').'/'.$student->photo}}"  style="width: 100% !important; ">
												</td>
												<td style="display: flex; flex-direction: row; justify-content: center;">
													<form method="post" action="{{route('addStudentToClas')}}" title="اضافه کردن در صنف" onclick='return confirm("آیا مطمیین استید که {{ $student->full_name}} در صنف {{$clases['name']}} اضافه شود؟")'>
														@csrf
														<input type="hidden" name="student_id" value="{{$student->id}}">
														<input type="hidden" name="class_id" value="{{$clases['id']}}">
														<button type="submit" class="btn btn-sm" style="background: transparent;">
															<i class="ti ti-plus text-black"></i>
														</button>
													</form>
													<a href="{{url('studentDetails').'/'.$student->id}}" title="جزییات" class="btn btn-sm">
														<i class="ti-info-alt text-info"></i>
													</a>
												</td>
											</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">
	$(document).on('click', '.btn-edit', function(e) {
		$(this).hide();
		$('.btn-save').show();
		$('.edit').removeClass('edit');

	});

</script>

@endsection
