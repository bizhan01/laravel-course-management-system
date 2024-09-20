@extends('layouts.master')
@section('content')
<div class="content-area pb-1">
	<div class="profile-header mb-1">
		<div class="profile-header-cover img-cover" style="background-image: url({{asset('img/photos-1/5.jpg')}});"></div>
		</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 col-md-3">
				<div class="card profile-card">
					<div class="profile-avatar">
						<img src="{{asset('UploadedImages/student').'/'.$student['photo']}}" alt="">
					</div>
					<div class="card-block">
						<h4 class="mb-0-25">{{ $student['full_name'] }}</h4>
					</div>
					<ul class="list-group">
						<p class="list-group-item" dir="ltr" style="text-align: right;" title="تلفن شاگرد">
							<span>{{ $student['phone'] }}</span>
							<i class="ti-mobile mr-0-5"></i>
						</p>
						<p class="list-group-item" dir="ltr" style="text-align: right;" title="تلفن والدین شاگرد">
							<span>{{ $student['parent_phone'] }}</span>
							<i class="ti-mobile mr-0-5"></i>
						</p>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="box box-block bg-white">
		<div class="overflow-x-auto">
			<table class="table table-striped table-bordered dataTable" id="table-1">
				<thead>
					<tr>
						<th>#</th>
						<th>نام مضمون</th>
						<th>تاریخ</th>
						<th>حاضر</th>
						<th>غیر حاضر</th>
						<th>نمره</th>
						<th>وضیعت</th>
					</tr>
				</thead>
				<tbody>
					@foreach($calsInfo as $ci)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$ci->subjectName}}</td>
							<td>{{$ci->year.' / '.$ci->month.' / '.$ci->day}}</td>
							<td>{{$ci->present}}</td>
							<td>{{$ci->absent}}</td>
							<td>{{$ci->score}}</td>
							<td>
								<center>
								@if($ci->score >= 50)
									<span class="btn btn-rounded btn-sm btn-success">کامیاب</span>
								@elseif($ci->score >= 45 && $ci->score <= 49)
									<button class="btn btn-rounded btn-sm btn-warning">چانس دوم</button>
								@else
									<span class="btn btn-rounded btn-sm btn-danger">ناکام</button>
								@endif
							</center>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	<div class="box box-block bg-white">
		 <center><h3>آمار پرداخت فیس محصل</h3></center>
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" >
					<thead>
						<tr>
							<th>شماره</th>
							<th>تاریخ</th>
							<th>اسم محصل</th>
							<th>اسم پدر</th>
							<th>صنف</th>
							<th>فیس</th>
							<th>تخفیف</th>
							<th>قابل پرداخت</th>
							<th>پرداخت</th>
							<th>باقیات</th>
						</tr>
					</thead>
					<tbody>
						<?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0;  ?>
						@foreach($feeInfo as $info)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$info->created_at}}</td>
								<td>{{$info->full_name}}</td>
								<td>{{$info->father_name}}</td>
								<td>{{$info->class}}</td>
								<td>{{$info->fee}}</td>
								<td>{{$info->discount}}</td>
								<td>{{$total = $info->fee - $info->discount}}</td>
								<td>{{$info->paid}}</td>
								<td style="direction: ltr; text-align: right; color: red">{{$rest = $total - $info->paid}}</td>
							</tr>
							<?php $sum1 += $info->fee; ?>
							<?php $sum2 += $info->discount; ?>
							<?php $sum3 += $total; ?>
							<?php $sum4 += $info->paid; ?>
							<?php $sum5 += $total - $info->paid; ?>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th colspan="5">جمله</th>
							<th colspan="1"><?php echo $sum1; ?></th>
							<th colspan="1"><?php echo $sum2; ?></th>
							<th colspan="1"><?php echo $sum3; ?></th>
							<th colspan="1"><?php echo $sum4; ?></th>
							<th colspan="1" style="color: red"><?php echo $sum5; ?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
