<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
<head>
	<style media="screen">
			*{
				font-size: 12px;
			}
	</style>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>چاپ بیل</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/themify-icons/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/animate.css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/waves/waves.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/switchery/dist/switchery.min.css') }}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

	</head>
	<body class="fixed-sidebar fixed-header skin-default">

		<div class="wrapper">
			<!-- Preloader -->
			<div class="preloader"></div>
			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<center style="margin-top: -15px"><br>
							<img src="\img\logo\logofrw.png" height="60px" alt="" /><br>
							<h6><span></span>مرکز آموزشی فیصل رحیمی</h6>
							<h6><span></span>فاکتور رسید فیس شاگردان</h6>
						</center>
						<div class="card">
							<div class="card-block">
								<div class="row mb-2">

									<div class="col-sm-8 col-xs-6">
										<strong><span></span>مرکز آموزشی فیصل رحیمی</strong>
										<p> <span></span> تلفن: 0782171742<br>
										 	 آدرس: چهارراهی قمبر، سرک چهل متره، کوچه ‎ی قلعه کاشف.
										</p>
									</div>

									<!-- <div class="col-sm-8 col-xs-6">
										<strong><span></span>مرکز آموزشی فیصل رحیمی</strong>
										<p> <span></span>تلفن: 0782171730<br>
											آدرس: سرک کمپنی، کوچه ی عمومی نیازبیک.
										</p>
									</div> -->

									<!-- <div class="col-sm-8 col-xs-6">
										<strong><span></span>مرکز آموزشی فیصل رحیمی</strong>
										<p> <span></span>تلفن: 0782171732<br>
											آدرس: ناحیه پنجم، بازار دیوانبگی.
										</p>
									</div> -->
								@foreach($fees as $material)

									<div class="">
										<strong><span></span>آی دی: {{$material->student_id}}</strong><br>
										<strong><span></span>اسم : {{$material->full_name}}</strong><br>
										<strong><span></span>اسم پدر: {{$material->father_name}}</strong><br>
									</div>
									<div class="" style="float: left; margin-left: 10px; margin-top: -90px;">
										  <img src="{{asset('./UploadedImages/student').'/'.$material->photo}}"  height="100" width="70" alt="No Image">
									</div>

								</div>
								<table class="table table-bordered " style="margin-top: -30px">
									<thead>
										<tr>
											<th><span></span>تاریخ</th>
											<th><span></span>اسم</th>
											<th><span></span>اسم پدر</th>
											<th><span></span>مضمون</th>
											<th><span></span>فیس</th>
											<th><span></span>تخفیف</th>
											<th><span></span>قابل پرداخت</th>
											<th><span></span>رسید</th>
											<th><span></span>باقی</th>
										</tr>
									</thead>
									<tbody>
										<tr>
                      <td><span></span>{{$material->created_at}}</td>
                      <td><span></span>{{$material->full_name}}</td>
                      <td><span></span>{{$material->father_name}}</td>
                      <td><span></span>{{$material->class}}</td>
                      <td><span></span>{{$material->fee}}</td>
                      <td><span></span>{{$material->discount}}</td>
                      <td><span></span><b>{{$total = $material->fee - $material->discount}}</b></td>
                      <td><span></span>{{$material->paid}}</td>
                      <td><span></span>{{$total - $material->paid}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="row">
									<div class="col-lg-6">
										<div class="col-sm-4 col-xs-6">
											<div class="clearfix mb-0-25">
												<strong class="float-xs-left"><span></span>امضا محصل<br>
													{{$material->full_name}}
												</strong>
											</div>
										</div>
												<strong class="float-xs-left"><span></span>امضا و مهر مسول مالی</strong>
									</div>

									<div class="col-lg-6">
										<div class="text-xs-right">
											<div class="mb-0-5"><span></span>فیس کلی: {{$material->fee}} افغانی</div>
											<div class="mb-0-5"><span></span>  تخفیف: <span>{{$material->discount}} افغانی</span>
										</div>
											<strong><span></span>
												رسید:
												{{$material->paid}}
											 افغانی
											</strong>
										</div>
									</div>
								</div>
								<h6><span></span>نوت: فیس پرداخت شده مستردد نمی گردد.</h6>
							</div>
							<div class="card-footer clearfix hidden-print">
                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light">
  							<button type="button" class="btn btn-info hidden-print label-left float-xs-right mr-0-5">
									<span class="btn-label"><i class="ti-printer"></i></span>
									چاپ بیل
								</button>
								</a>
									<a href="/"><button type="button" class="btn-warning hidden-print" name="button" >برگشت</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/tether/js/tether.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/bootstrap4-rtl/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/detectmobilebrowser/detectmobilebrowser.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/mwheelIntent.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jquery-fullscreen-plugin/jquery.fullscreen-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/waves/waves.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/switchery/dist/switchery.min.js') }}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
	</body>


<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
</html>
