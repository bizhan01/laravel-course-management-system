@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script>
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
				<!-- ُSuccess Flash Message -->
					@if($success = session('success'))
					<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
							<div>{{$success}}</div>
					</div>
					@endif
        <center> <h4>ثبت تدارکات (مصارف)</h4> </center>
        <form method="POST" action="/expense" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
              <div class="col-md-3">
                <label for="fullName" style="color: black">اسم جنس</label>
                <input type="text" name="item" value="" class="form-control" placeholder="اسم جنس" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">تاریخ</label>
                <input type="date" name="date" value=""  class="form-control"  required>
              </div>
              <div class="col-md-3">
                <label for="fullName"  style="color: black">دسته بندی</label>
                <select class="form-control" name="category" style="padding: 0px;">
                  <option value=" مواد غذایی ">مواد غذایی</optio>
                  <option value=" متفرقه ">متفرقه</optio>
                  <option value=" اجناس">خرید اجناس</optio>
                  <option value=" ترمیمات">ترمیمات</optio>
                  <option value="تبلغات ">تبلغات</optio>
                  <option value="مصارف اداری ">مصارف اداری</optio>
                  <option value="معاش ">معاش</optio>
                  <option value="آب ">آب</optio>
                  <option value=" برق">برق</optio>
                  <option value="مالیه ">مالیه</optio>
                  <option value="سایر ">سایر</optio>
                </select>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">منبع مصرف</label>
                <input type="text" name="consumer" value=""  class="form-control" placeholder="مصرف کننده" required>
              </div>
            </div>
          <div class="row form-group">
              <div class="col-md-3 ">
                <label for="fullName" style="color: black">نمبر بل</label>
                <input type="number" name="billNumber" value="" class="form-control" placeholder="نمبر بل">

              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">قیمت (فی دانه)</label>
                <input type="number" name="price" value=""  id="fn"  class="form-control" placeholder="قیمت (فی دانه) "  required>
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">تعداد</label>
                <input type="number" name="quantity" value="" id="sn" class="form-control"  placeholder="تعداد"  required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">قیمت کلی </label>
                <input type="number" name="total" value="" readonly id="mul"  class="form-control" placeholder="قیمت کلی " required>
              </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <button type="submit" name="submit" class="btn btn-rounded btn-primary"> <i class="fa fa-save"></i> ذخیره ریکارت جدید </button>
                </div>
              </div>
        </form>
    </div>
  </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">

        <!-- date Start -->
        <div class="">
          <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید مصارف را ببینید.</p>
          <div class="row">
            <div class="col-md-4">
              <h6>از تاریخ</h6>
                <input type="date" name="from" class="form-control from" value="{{old('from')}}" required>
            </div>
            <div class="col-md-4">
              <h6>تا تاریخ</h6>
              <input class="form-control to" name="to" type="date" required>
            </div>
            <div class="col-md-4">
              <h6>&nbsp;</h6>
              <a href="">
                <button class="btn btn-success btn-block"  id="btnGetOrderByDate">
                  <a href="" class="text-black">نمایش</a>
                </button>
              </a>
            </div>
          </div>
        </div><hr>
        <!-- date End -->

      <table class=" table  table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>جنس</th>
            <th>تاریخ</th>
            <th>کتگوری</th>
            <th>مصرف کننده</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>قیمت کلی</th>
            <th class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"></th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expenses)
          <tr>
            <td>{{$expenses->id}}</td>
            <td>{{$expenses->item}}</td>
            <td>{{$expenses->date}}</td>
            <td>{{$expenses->category}}</td>
            <td>{{$expenses->consumer}}</td>
            <td>{{$expenses->billNumber}}</td>
            <td>{{$expenses->price}}</td>
            <td>{{$expenses->quantity}}</td>
            <td>{{$expenses->total}}</td>
            <td class="pull-left <?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>" style="display: flex; flex-direction: row; justify-content: center;">
              <a href="{{ URL::to('expense/' . $expenses->id . '/edit') }}" class="btn"><li class="fa fa-edit text-primary" title="ویرایش"></li></a>
              <form action="{{url('expense', [$expenses->id])}}" method="POST" title="حذف">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn"><li class="fa fa-trash text-danger"></li></button>
              </form>
            </td>
          </tr>
          <?php $sum += $expenses->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="7">جمله مصارف</th>
              <th colspan="4"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">


  $(document).on('click','#btnGetOrderByDate',function(e){
    e.preventDefault();
    var from = $('.from').val();
    var to = $('.to').val();
    if (from.indexOf('/') > -1) {
      from = from.replace(/\//g,'-');
    }
    if (to.indexOf('/',to) > -1) {
      var to = to.replace(/\//g,'-');
    }
    if (from.length > 0 && to.length > 0) {
      window.location.href = '<?= url('expenses') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تارخ ها را انتخاب کنید');
    }
  });
</script>


@endsection
