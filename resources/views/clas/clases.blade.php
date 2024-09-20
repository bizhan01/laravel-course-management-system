@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست صنف ها</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">صنف ها</a></li>
			<li class="breadcrumb-item active">لیست صنف ها</li>
		</ol>

		@include('layouts.errors')
		
		<div class="box box-block bg-white">
			<p class="font-90 text-muted mb-1">فیلتر صنف ها به اساس <span class="text-danger">سال/ماه</span></p>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>سال</label>
						<select class="form-control year">
							@for($i = 1399; $i <= date('Y')-621; $i++) 
								<option <?php if ($i == session('year')): ?>
									<?php echo 'selected' ?>
								<?php endif ?>>{{$i}}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>ماه</label>
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
						<select class="no-padding form-control month" name="month">
							@for($i = 1; $i <= 12; $i++)
								<option <?php if ($month[$i] == session('month')): ?>
									<?php echo 'selected' ?>
								<?php endif ?>> {{ $month[$i]}} </option>
							@endfor
							<option <?php if (session('month') == ''): ?>
								<?php echo 'selected' ?>
							<?php endif ?> value="">همه</option>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>&nbsp;</label>
						<button class="btn btn-success btn-block" id="btnFilterClas">
							<a href="" class="text-black">فیلتر</a>
                		</button>
					</div>
				</div>
			</div>

		</div>

		<div class="box box-block bg-white">
			@if(session('year'))
			<p class="font-90 text-muted mb-1">لیست صنف های سال
				<span class="text-danger">{{ session('year') }}</span>
				<span>ماه </span>
				<span class="text-danger">{{session('month')}}</span>
			</p>
			@endif

			<p class="font-90 text-muted mb-1 <?php if (session('year')): ?>
				<?php echo 'hide' ?>
			<?php endif ?>">لیست صنف های سال جاری
			</p>

 			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-3">
					<thead>
						<tr>
							<th>#</th>
							<th>نام صنف</th>
							<th>وضعیت</th>
							<th>استاد</th>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($clases as $clas)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$clas->name}}</td>
								<td>
									@if($clas->status == '1') 
										<span class="tag tag-primary">درحال جریان</span>
									@elseif($clas->status == '2')
										<span class="tag tag-danger">خاتمه یافته</span>
									@else
										<span class="tag tag-warning">شروع نشده</span>
									@endif
								</td>
								<td>
									{{ $clas->teacher }}
								</td>
								<td style="display: flex; flex-direction: row; justify-content: center;">
									<a href="{{ url('deleteClas').'/'.$clas->id }}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
										<i class="ti ti-trash text-danger"></i>
									</a>
									&nbsp;&nbsp;&nbsp;
									<a href="{{ url('editClass').'/' .$clas->id }}" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>&nbsp;&nbsp;&nbsp;
									<a href="{{ url('clasDetails').'/' .$clas->id }}" title="جزییات">
										<i class="ti-info-alt text-info"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>نام صنف</th>
							<th>وضعیت</th>
							<th>استاد</th>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		
		
	</div>
</div>
<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">


  $(document).on('click','#btnFilterClas',function(e){
    e.preventDefault();
    var year = $('.year').val();
    var month = $('.month').val();
    
    if (year.length > 0 || month.length > 0 || day.length > 0) {
      window.location.href = '<?= url('clases') ?>'+'/'+year+'/'+month;
    }else{
      alert('لطفا سال یا ماه یا هم روز را انتخاب کنید');
    }
  });
</script>
@endsection