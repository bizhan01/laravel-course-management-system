@extends('layouts.master')

@section('content')
<div class="content-area pb-1">

	<div class="profile-header mb-1">
		<div class="profile-header-cover img-cover" style="background-image: url({{asset('img/photos-1/6.jpg')}});"></div>
		<!-- <div class="profile-header-counters clearfix">
			<div class="container-fluid">
				<div class="float-xs-right">
					<a href="#" class="text-black">
						
						<span class="text-muted">تایم ختم</span>
					</a>

				</div>
				<div class="float-xs-right">
					<a href="#" class="text-black">
						
						<span class="text-muted">تایم شروع</span>
					</a>
				</div>
			</div>
		</div> -->
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<div class="card profile-card">
					<div class="profile-avatar">
						<img src="{{asset('UploadedImages/subject').'/'.$subject['photo']}}" alt="">
					</div>
					<div class="card-block">
						<h4 class="mb-0-25">{{ $subject['name'] }}</h4>
<!-- 
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary btn-rounded waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								وضعیت
							</button>

						</div> -->
					</div>

				</div>
				<!-- <div class="card">
					<div class="card-header text-uppercase"><b>فیس و تخفیف</b></div>
					<div class="items-list">
						<div class="il-item">
							<a class="text-black">
								<div class="media">
									<div class="media-body">
										<h6 class="media-heading">فیس</h6>
									</div>
								</div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" >
								<div class="media">
									<div class="media-body">
										<h6 class="media-heading">تخفیف</h6>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div> -->
				<!-- <div class="box bg-white">
					<ul class="nav nav-4">
						<li class="nav-item" title="استاد">
							<a class="nav-link">
								<i class="ti-user"></i>
								<span>
								
								</span>
							</a>
						</li>
					</ul>
				</div> -->
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
						<!-- <li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#students" role="tab">شاگردان</a>
						</li> -->
						<!-- <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab">Photos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#friends" role="tab">Friends</a>
						</li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active " id="students" role="tabpanel">

							<div class="media stream-item">

								@include('layouts.errors')

								<div class="media-body">
									<div class="stream-body">
										<div class="col-md-12">
											<h4>توضیحات در مورد مضمون</h4>
											<p>{{ $subject['description'] }}</p>
											<!-- <form method="post" action="">
												@csrf
												<table class="table mb-md-0 table-hover table-striped">
													<thead>
														<tr>
															<th>#</th>
															<th>عکس</th>
															<th>نام</th>
															<th>نام پدر</th>
															<th>حاضر</th>
															<th>غیر حاضر</th>
															<th>نمره</th>
															<th>جزییات</th>
														</tr>
													</thead>
													<tbody>
														
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
 -->

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
						<div class="tab-pane card-block" id="friends" role="tabpanel">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="box box-block mb-1">
										<div class="media">
											<div class="media-left">
												<div class="avatar box-48">
													<img class="b-a-radius-circle" src="img/avatars/8.jpg" alt="">
													<i class="status bg-success bottom right"></i>
												</div>
											</div>
											<div class="media-body">
												<h6 class="media-heading mt-0-5"><a class="text-black" href="#">John Doe</a></h6>
												<span class="font-90 text-muted">Software Engineer</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="box box-block mb-1">
										<div class="media">
											<div class="media-left">
												<div class="avatar box-48">
													<img class="b-a-radius-circle" src="img/avatars/9.jpg" alt="">
													<i class="status bg-success bottom right"></i>
												</div>
											</div>
											<div class="media-body">
												<h6 class="media-heading mt-0-5"><a class="text-black" href="#">John Doe</a></h6>
												<span class="font-90 text-muted">Software Engineer</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="box box-block mb-1">
										<div class="media">
											<div class="media-left">
												<div class="avatar box-48">
													<img class="b-a-radius-circle" src="img/avatars/10.jpg" alt="">
													<i class="status bg-success bottom right"></i>
												</div>
											</div>
											<div class="media-body">
												<h6 class="media-heading mt-0-5"><a class="text-black" href="#">John Doe</a></h6>
												<span class="font-90 text-muted">Software Engineer</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="box box-block">
										<div class="media">
											<div class="media-left">
												<div class="avatar box-48">
													<img class="b-a-radius-circle" src="img/avatars/1.jpg" alt="">
													<i class="status bg-success bottom right"></i>
												</div>
											</div>
											<div class="media-body">
												<h6 class="media-heading mt-0-5"><a class="text-black" href="#">John Doe</a></h6>
												<span class="font-90 text-muted">Software Engineer</span>
											</div>
										</div>
									</div>
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