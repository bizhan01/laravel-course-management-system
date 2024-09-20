@extends('layouts.master')

@section('content')
<!-- <div class="container">
  <br>
<center> <h1>ثبت اجناس (سرمایه های ثابت)</h1> </center>
<form method="POST" action="/personlInfo" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row form-group">
            <div class="col-md-4 mb-3 mb-md-0">
              <label for="fullName" style="color: black">اسم جنس</label>
              <input type="text" name="fullName" value="" class="form-control" placeholder="اسم جنس" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">تاریخ خرید</label>
              <input type="date" name="profession" value=""  class="form-control" placeholder="تاریخ خرید" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">نمبر بل </label>
              <input type="number" name="profession" value=""  class="form-control" placeholder="نمبر بل" required>
            </div>
          </div>
          <div class="row form-group">
              <div class="col-md-4 mb-3 mb-md-0">
                <label for="Date of Birth" style="color: black">تعداد </label>
                  <input type="text" name="dob" value="" class="form-control" placeholder="تعداد">
              </div>
              <div class="col-md-4">
                <label for="phoneNumber" style="color: black"> موقیعت</label>
                <input type="text" name="phone" value=""  class="form-control" placeholder="موقیعت" required>
              </div>
              <div class="col-md-4">
                <label for="phoneNumber" style="color: black">قیمت</label>
                <input type="number" name="phone" value=""  class="form-control" placeholder="قیمت" required>
              </div>
            </div>

              <div class="row form-group">

                  <div class="col-md-6">
                     <br>
                      <input type="submit" name="submit" value="ذخیره" class="btn btn-success">
                  </div>
                </div>
        @include('layouts.errors')
      </form>
</div> -->

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <h4 class="mb-1">لیست اجناس ( سرمایه های ثابت)</h4>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم جنس</th>
            <th>تاریخ خرید</th>
            <th>موقیعت</th>
            <th>نمبر بل</th>
            <th>تعداد</th>
            <th>قیمت فی دانه</th>
            <th>جمله</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expense)
          <tr>
            <td>{{$expense->item}}</td>
            <td>{{$expense->date}}</td>
            <td>{{$expense->consumer}}</td>
            <td>{{$expense->billNumber}}</td>
            <td>{{$expense->quantity}}</td>
            <td>{{$expense->price}}</td>
            <td>{{$expense->total}}</td>
          </tr>
            <?php $sum += $expense->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="5">جمله عواید</th>
              <th colspan="2" style="text-align: center"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
