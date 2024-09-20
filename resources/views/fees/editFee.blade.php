@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>ویرایش رکورد</h3></center><hr>
				<form action = "/editFee/<?php echo $fee[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
					<div class="row form-group">
						<div class="col-md-6">
							<label  style="color: black">آی دی محصل <span style="color: red">*</span></label>
							<input type="number"  name="student_id" value="<?php echo $fee[0]->student_id; ?>"  class="form-control"  placeholder="آی دی محصل" required>
						</div>
						<div class="col-md-6">
							<label  style="color: black">صنف<span style="color: red">*</span></label>
							<select class="form-control" name="class" required>
								<option value="<?php echo $fee[0]->class; ?>"><?php echo $fee[0]->class; ?></option>
									@foreach($classes as $class)
									<option>{{$class->name}}</option>
									@endforeach
							</select>
						</div>
					</div>
					 <div class="row form-group">
						 <div class="col-md-4">
							 <label  style="color: black">فیس <span style="color: red">*</span></label>
								<input type="number"  name="fee" value="<?php echo $fee[0]->fee; ?>"  class="form-control"  placeholder="فیس" required>
						 </div>
						 <div class="col-md-4">
							 <label  style="color: black">تخفیف<span style="color: red">*</span></label>
							 <input type="number"  name="discount" value="<?php echo $fee[0]->discount; ?>"  class="form-control"  placeholder="فیس" required>
						 </div>
						 <div class="col-md-4">
							 <label  style="color: black">رسید<span style="color: red">*</span></label>
							 	<input type="number"  name="paid" value="<?php echo $fee[0]->paid; ?>"  class="form-control"  placeholder="فیس" required>
						 </div>
					 </div>
					 <div class="row form-group">
						 <div class="col-md-6">
							 <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
							 <input type="reset"  value="لغو" class="btn btn-warning ">
						 </div>
					</div>
				 @include('layouts.errors')
			 </form>
			</nav>
		</div>
	</div>
	@endsection
