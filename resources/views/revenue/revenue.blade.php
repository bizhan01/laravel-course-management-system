@extends('layouts.master')
@section('content')
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
        <center> <h4>ثبت عواید</h4> </center>
        <form method="POST" action="/revenue" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-group">
                <div class="col-md-4">
                  <label for="profession" style="color: black">تاریخ</label>
                  <input type="date" name="date" value=""  class="form-control"  required>
                </div>
                <div class="col-md-4">
                  <label for="fullName" style="color: black">منبع</label>
                  <input type="text" name="source" value="" class="form-control" placeholder="منبع" required>
                </div>
                <div class="col-md-4">
                  <label for="profession" style="color: black">مبلغ </label>
                  <input type="number" name="amount" value=""  class="form-control" placeholder="مبلغ" required>
                </div>
              </div>
              <div class="col-md-13" >
                <label for="">توضیحات</label>
                <textarea name="description" class="form-control" id="exampleTextarea" rows="3" ></textarea>
              </div>
             <br>
              <div class="row form-group">
                  <div class="col-md-6">
                      <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success ">
                  </div>
                </div>
            @include('layouts.errors')
          </form>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">

      <!-- date Start -->
      <div class="">
        <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید عواید را ببینید.</p>
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

      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ</th>
            <th>منبع</th>
            <th>مبلغ</th>
            <th>توضیحات</th>
            <th class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"></th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($revenues as $revenue)
          <tr>
            <td>{{$revenue->date}}</td>
            <td>{{$revenue->source}}</td>
            <td>{{$revenue->amount}}</td>
            <td>{{$revenue->description}}</td>
            <td style="display: flex; flex-direction: row; justify-content: center;" class="pull-left <?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
              <a href="{{ URL::to('revenue/' . $revenue->id . '/edit') }}" class="btn"><li class="fa fa-edit" title="ویرایش"></li></a>
              <form action="{{url('revenue', [$revenue->id])}}" method="POST" title="حذف">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn"><li class="fa fa-trash text-danger"></li></button>
              </form>
            </td>
          </tr>
          <?php $sum += $revenue->amount; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="2">جمله عواید</th>
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
      window.location.href = '<?= url('revenues') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تارخ ها را انتخاب کنید');
    }
  });
</script>

@endsection
