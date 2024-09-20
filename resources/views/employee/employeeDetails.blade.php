@extends('layouts.master')
@section('content')
<div class="content-area pb-1">
  <div class="profile-header mb-1">
    <div class="profile-header-cover img-cover" style="background-image: url('{{asset('img/photos-1/4.jpg')}}');"></div>
    <div class="profile-header-counters clearfix">
      <div class="container-fluid">
        <div class="float-xs-right">
          <a href="#" class="text-black">
            <h5 class="font-weight-bold">{{ $employee['dob'] }}</h5>
            <span class="text-muted">تاریخ تولد</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <div class="card profile-card">
          <div class="profile-avatar">
            <img src="{{ asset('UploadedImages').'/' .$employee['profileImage'] }}" alt="عکس">
          </div>
          <div class="card-block">
            <h4 class="mb-0-25">{{ $employee['fullName'] }}</h4>
            <div class="text-muted mb-1">{{ $employee['position'] }}</div>
          </div>

        </div>

        <div class="card">
          <div class="card-header text-uppercase"><b>تماس</b></div>
          <div class="items-list">
            <div class="il-item">
              <div class="media">
                <div class="media-body" dir="ltr" style="text-align: right;">
                  <span class="text-muted">{{ $employee['phone1'] }}</span>
                  <i class="ti ti-mobile"></i>
                </div>
              </div>
            </div>
            <div class="il-item">
              <div class="media">
                <div class="media-body" dir="ltr" style="text-align: right;">
                  <span class="text-muted">{{ $employee['phone2'] }}</span>
                  <i class="ti ti-mobile"></i>
                </div>
              </div>
            </div>
            <div class="il-item">
              <div class="media">
                <div class="media-body" dir="ltr" style="text-align: right;">
                  <span class="text-muted">{{ $employee['email'] }}</span>
                  <i class="ti ti-email"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

<!--         <div class="box bg-white">
          <ul class="nav nav-4">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ti-home"></i> My Profile
                <div class="tag tag-warning float-xs-right">14</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ti-pulse"></i> Balance
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ti-wallet"></i> Friends
                <div class="tag tag-purple float-xs-right">14</div>
              </a>
            </li>
            <li class="nav-item b-b-0">
              <a class="nav-link" href="#">
                <i class="ti-help-alt"></i> Settings
              </a>
            </li>
          </ul>
        </div> -->
<!--         <div class="box bg-info mb-0">
          <div class="box-block">
            <div class="media">
              <div class="media-left">
                <div class="avatar box-48">
                  <img class="b-a-radius-circle" src="img/avatars/4.jpg" alt="">
                </div>
              </div>
              <div class="media-body">
                <h6 class="media-heading mt-0-5"><a class="text-white mr-1" href="#">John Doe</a></h6>
                <div class="font-90 mb-0-5">Software Engineer</div>
                <button type="button" class="btn btn-outline-white btn-rounded">Accept</button>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <div class="col-sm-8 col-md-9">
        <div class="card mb-0">
          <ul class="nav nav-tabs nav-tabs-2 profile-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#main-address" role="tab">سکونت اصلی</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#current-address" role="tab">سکونت فعلی</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#documents" role="tab">اسناد</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="main-address" role="tabpanel">
              <div class="media stream-item">
                <div class="media-left">
                  <div class="avatar box-64">
                    <img class="b-a-radius-circle" src="img/avatars/5.jpg" alt="">
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">ولایت</h6>
                  <div class="stream-body">
                    <p>{{ $employee['province1'] }}</p>
                  </div>
                </div>
              </div>
              <div class="media stream-item">
                <div class="media-left">
                  <div class="avatar box-64">
                    <img class="b-a-radius-circle" src="img/avatars/6.jpg" alt="">
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">ولسوالی</h6>
                  <div class="stream-body">
                    <a href="img/1.html">
                      <img class="stream-img" src="img/photos-1/2.jpg" alt="">
                    </a>
                    <p>{{ $employee['district1'] }}</p>
                  </div>
                </div>
              </div>
              <div class="media stream-item">
                <div class="media-left">
                  <div class="avatar box-64">
                    <img class="b-a-radius-circle" src="img/avatars/7.jpg" alt="">
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">ناحیه / قریه</h6>
                  <div class="stream-body">
                    <p>{{ $employee['region1'] }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="current-address" role="tabpanel">
              <div class="media stream-item">
                <div class="media-left">
                  <div class="avatar box-64">
                    <img class="b-a-radius-circle" src="img/avatars/5.jpg" alt="">
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">ولایت</h6>
                  <div class="stream-body">
                    <p>{{ $employee['province2'] }}</p>
                  </div>
                </div>
              </div>
              <div class="media stream-item">
                <div class="media-left">
                  <div class="avatar box-64">
                    <img class="b-a-radius-circle" src="img/avatars/6.jpg" alt="">
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">ولسوالی</h6>
                  <div class="stream-body">
                    <a href="img/1.html">
                      <img class="stream-img" src="img/photos-1/2.jpg" alt="">
                    </a>
                    <p>{{ $employee['district2'] }}</p>
                  </div>
                </div>
              </div>
              <div class="media stream-item">
                <div class="media-left">
                  <div class="avatar box-64">
                    <img class="b-a-radius-circle" src="img/avatars/7.jpg" alt="">
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">ناحیه / قریه</h6>
                  <div class="stream-body">
                    <p>{{ $employee['region2'] }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane card-block" id="documents" role="tabpanel">
              <div class="gallery-2 row">
                <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="g-item">
                    <a href="{{ asset('UploadedImages').'/' .$employee['tazkira'] }}" target="_blank">
                      <img src="{{ asset('UploadedImages').'/' .$employee['tazkira'] }}" alt="تذکره">
                    </a>
                    <div class="g-item-overlay clearfix">
                      <div class="float-xs-left">
                        <a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="mr-0-5"></i>تذکره</a>
                      </div>
                      <!-- <div class="float-xs-right">
                        <a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-comment mr-0-5"></i>20</a>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="g-item">
                    <a href="{{ asset('UploadedImages').'/' .$employee['warranty'] }}" target="_blank">
                      <img src="{{ asset('UploadedImages').'/' .$employee['warranty'] }}" alt="ضمانت خط">
                    </a>
                    <div class="g-item-overlay clearfix">
                      <div class="float-xs-left">
                        <a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="mr-0-5"></i>ضمانت خط</a>
                      </div>
                      <!-- <div class="float-xs-right">
                        <a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-comment mr-0-5"></i>20</a>
                      </div> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="g-item">
                    <a href="{{ asset('UploadedImages').'/' .$employee['profileImage'] }}" target="_blank">
                      <img src="{{ asset('UploadedImages').'/' .$employee['profileImage'] }}" alt="عکس">
                    </a>
                    <div class="g-item-overlay clearfix">
                      <div class="float-xs-left">
                        <a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="mr-0-5"></i>عکس</a>
                      </div>
                      <!-- <div class="float-xs-right">
                        <a class="text-white" href="#" data-toggle="modal" data-target="#likesModal"><i class="ti-comment mr-0-5"></i>20</a>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
