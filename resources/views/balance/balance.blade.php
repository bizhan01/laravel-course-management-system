@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script><br>
<center> <h3>صورت حساب (بیلانس)</h3> </center>
  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">

        <!-- date Start orders. -->
        <div class="">
          <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید بیلانس مالی را ببینید.</p>
          <div class="row">
            <div class="col-md-4">
              <h6>از تاریخ</h6>
                <input type="date" class="form-control from" required>
            </div>
            <div class="col-md-4">
              <h6>تا تاریخ</h6>
              <input class="form-control to" type="date" value="{{date('Y-m-d')}}" required>
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
      </div>
    </div>
  </div>


  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <center><h4>لیست صنف ها</h4></center>

        <!-- date Start revenu-->
        <!-- date End -->

        <table class="table table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>آی دی</th>
              <th>صنف</th>
              <th>فیس</th>
              <th>تخفیف</th>
              <th>قابل پرداخت</th>
              <th>رسید</th>
              <th>باقیات</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0;?>
            @foreach($fees as $fee)
            <tr>
              <td>{{$fee->student_id}}</td>
              <td>{{$fee->class}}</td>
              <td>{{$fee->fee}}</td>
              <td>{{$fee->discount}}</td>
              <td>{{$total = $fee->fee - $fee->discount}}</td>
              <td>{{$fee->paid}}</td>
              <td style="color: red"><b>{{$rest = $total - $fee->paid}}</b></td>
            </tr>
            <?php $sum1 += $fee->fee; ?>
            <?php $sum2 += $fee->discount; ?>
            <?php $sum3 += $total; ?>
            <?php $sum4 += $fee->paid; ?>
            <?php $sum5 += $rest; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله</th>
                <th colspan="1"><?php echo $sum1; ?></th>
                <th colspan="1"><?php echo $sum2; ?></th>
                <th colspan="1"><?php echo $sum3; ?></th>
                <th colspan="1"><?php echo $sum4; ?></th>
                <th colspan="4" style="color: red"><?php echo $sum5; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      <center style="color: green"><h3>جمله فیس اخذ شده: <span><?php echo $sum4; ?></span></h3></center>
      </div>
    </div>
  </div><!-- Content -->


  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <center><h4>لیست عواید</h4></center>

        <!-- date Start revenu-->
        <!-- date End -->

        <table class="table table-success table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>منبع</th>
              <th>مبلغ</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum6=0; ?>
            @foreach($revenues as $revenue)
            <tr>
              <td>{{$revenue->date}}</td>
              <td>{{$revenue->source}}</td>
              <td>{{$revenue->amount}}</td>
            </tr>
            <?php $sum6 += $revenue->amount; ?>
            @endforeach
            <tfoot style="background: #adb7a9">
              <tr>
                <th colspan="2">
                <strong>جمله عواید</strong>
                <small class="text-muted">حساب شده از عواید متفرقه</small>
              </th>
                <th colspan="1" id="fn"><?php echo $sum6; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <strong>جمله عواید</strong>
          <strong class="text-success"><?php $total = $sum4 + $sum6; echo $total;?></strong>
          <span><small class="text-muted">حساب شده از عواید متفرقه و فیس صنف ها</small></span>
        </center>
      </div>
    </div>
  </div><!-- Content -->




  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <center><h4>لیست مصارف</h4></center>
        <!-- Archive Start -->
          <!-- Archive End -->
        <table class="table table-warning  table-striped table-bordered dataTable" id="table-1">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>جنس</th>
              <th>قیمت کلی</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum2=0; ?>
            @foreach($expenses as $expenses)
            <tr>
              <td>{{$expenses->date}}</td>
              <td>{{$expenses->item}}</td>
              <td>{{$expenses->total}}</td>
            </tr>
            <?php $sum2 += $expenses->total; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله مصارف</th>
                <th colspan="1" ><?php echo $sum2; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <h5 class="text-danger"> جمله مصارف <?php
            echo $sum2;
         ?></h5> </center>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row row-md">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-success mb-2">
        <div class="t-icon right"><i class="ti-bar-chart"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $total; ?></h1><br>
          <h6 class="text-uppercase">عواید</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-danger mb-2">
        <div class="t-icon right"><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $sum2; ?></h1><br>
          <h6 class="text-uppercase">مصارف</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-primary mb-2">
        <div class="t-icon right"><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
            $c = $total - $sum2;
            echo $c;
           ?>
          </h1><br>
          <h6 class="text-uppercase">بیلانس</h6>
        </div>
      </div>
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
      window.location.href = '<?= url('blancess') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تارخ ها را انتخاب کنید');
    }
  });
</script>


@endsection
