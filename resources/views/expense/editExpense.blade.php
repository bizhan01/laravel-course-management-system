@extends('layouts.master')

@section('content')
<script src="{{url('js/jquery.min.js')}}"> </script>
<script src="{{url('js/math.js')}}"> </script>
<div class="" style="padding: 50px">
<h4>ویرایش مصارف</h4>
<hr>
 <form action="{{url('expense', [$expense->id])}}" method="POST">
 <input type="hidden" name="_method" value="PUT">
 {{ csrf_field() }}
 <div class="row form-group">
     <div class="col-md-3 ">
       <label for="item" style="color: black">اسم جنس</label>
       <input type="text" name="item" value="{{$expense->item}}" class="form-control" placeholder="اسم جنس" required>
     </div>

     <div class="col-md-3 ">
       <label for="date" style="color: black">تاریخ</label>
       <input type="date" name="date" value="{{$expense->date}}"  class="form-control"  required>
     </div>

     <div class="col-md-3">
      <?php $category_list = array('مواد غذایی', 'متفرقه', 'خرید اجناس', 'ترمیمات', 'تبلغات', 'مصارف اداری', 'معاش', 'آب', 'برق', 'مالیه', 'سایر'); ?>
       <label for="category"  style="color: black">دسته یندی</label>
       <select class="form-control" name="category" value="{{$expense->category}}" style="padding: 0px;">  
          @foreach($category_list as $cl)
            <option 
              <?php if ($expense->category == $cl): ?>
                <?php echo 'selected' ?>
              <?php endif ?>
            >{{ $cl }}</option>
          @endforeach
       </select>
     </div>
     <div class="col-md-3">
       <label for="profession" style="color: black">منبع مصرف</label>
       <input type="text" name="consumer" value="{{$expense->consumer}}"  class="form-control" placeholder="مصرف کننده" required>
     </div>
   </div>

 <div class="row form-group">
     <div class="col-md-3 ">
       <label for="fullName" style="color: black">نمبر بل</label>
       <input type="number" name="billNumber" value="{{$expense->billNumber}}" class="form-control" placeholder="نمبر بل">
     </div>
     <div class="col-md-3">
       <label for="profession" style="color: black">قیمت (فی دانه)</label>
       <input type="number" name="price" value="{{$expense->price}}"  id="fn"  class="form-control" placeholder="قیمت (فی دانه) "  required>
     </div>
     <div class="col-md-3">
       <label for="fullName" style="color: black">تعداد</label>
       <input type="number" name="quantity" value="{{$expense->quantity}}" id="sn" class="form-control"  placeholder="تعداد"  required>
     </div>
     <div class="col-md-3">
       <label for="profession" style="color: black">قیمت کلی </label>
       <input type="number" name="total"  value="{{$expense->total}}"  readonly id="mul"  class="form-control" placeholder="قیمت کلی " required>
     </div>
   </div>

  @include('layouts.errors')
 <button type="submit" class="btn btn-success">ذخیره</button>
<a href="/expense"><button type="reset" class="btn btn-primary">لغو</button> </a>
<a href="/expense"><button type="button" class="btn btn-default">برگشت</button> </a>
</form>
</div>

@endsection
