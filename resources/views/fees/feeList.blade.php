@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
      <center><h4 class="mb-1">لیست کامل فیس پرداخت شده</h4></center>
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
            <th>آی دی</th>
            <th>اسم </th>
            <th>اسم پدر</th>
            <th>صنف</th>
            <th>فیس</th>
            <th>تخفیف</th>
            <th>قابل پرداخت</th>
            <th>رسید</th>
            <th>باقیات</th>
            <th>پرنت</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0;?>
          @foreach($fees as $fee)
          <tr>
            <td>{{$fee->student_id}}</td>
            <td>{{$fee->full_name}}</td>
            <td>{{$fee->father_name}}</td>
            <td>{{$fee->class}}</td>
            <td>{{$fee->fee}}</td>
            <td>{{$fee->discount}}</td>
            <td>{{$total = $fee->fee - $fee->discount}}</td>
            <td>{{$fee->paid}}</td>
            <td style="color: red"><b>{{$rest = $total - $fee->paid}}</b></td>
            <td>
              <a class="text-primary" href="/printFee/{{ $fee->id }}"><i class="fa fa-print btn btn-rounded btn-primary"></i></a>
            </td>
            <td>
              <a class="text-success" href="/editFee/{{ $fee->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
              <a class="text-danger" href="/deleteFee/{{ $fee->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $sum1 += $fee->fee; ?>
          <?php $sum2 += $fee->discount; ?>
          <?php $sum3 += $total; ?>
          <?php $sum4 += $fee->paid; ?>
          <?php $sum5 += $rest; ?>

          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله</th>
              <th colspan="1"><?php echo $sum1; ?></th>
              <th colspan="1"><?php echo $sum2; ?></th>
              <th colspan="1"><?php echo $sum3; ?></th>
              <th colspan="1"><?php echo $sum4; ?></th>
              <th colspan="4" style="color: red"><?php echo $sum5; ?></th>
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
      window.location.href = '<?= url('fees') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تاریخ را مشخص کنید!');
    }
  });
</script>

@endsection
