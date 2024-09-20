<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">مینو ها</li>

      <li class="with-sub">
        <a href="/" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-anchor"></i></span>
          <span class="s-text">داشبورد</span>
        </a>
      </li>


      <!-- teachers -->
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-user"></i></span>
          <span class="s-text">اساتید</span>
        </a>
        <ul>
          <li class="<?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"><a href="{{ route('addTeacher') }}">ثبت استاد</a></li>
          <li><a href="{{ route('teacherList') }}">لیست اساتید</a></li>
        </ul>
      </li>

      <!-- subjects -->
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-book"></i></span>
          <span class="s-text">مضامین</span>
        </a>
        <ul>
          <li><a href="{{ route('addSubCat') }}">دسته بندی مضامین</a></li>
          <li><a href="{{ route('addSubject') }}">اضافه نمودن مضمون</a></li>
          <li><a href="{{ route('subjectList') }}">لیست مضامین</a></li>
        </ul>
      </li>




      <!-- subjects -->
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-home"></i></span>
          <span class="s-text">صنف ها</span>
        </a>
        <ul>
          <li><a href="{{ route('addClas') }}">ایجاد صنف</a></li>
          <li><a href="{{ route('clases') }}">لیست صنف ها</a></li>
        </ul>
      </li>

      <!-- students -->
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-id-badge"></i></span>
          <span class="s-text">شاگردان</span>
        </a>
        <ul>
          <li class="<?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"><a href="{{ route('addStudent') }}">ثبت شاگرد</a></li>
          <li><a href="{{ route('studentList') }}">لیست شاگردان</a></li>
        </ul>
      </li>

      <!-- Fee -->
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-money"></i></span>
          <span class="s-text">فیس</span>
        </a>
        <ul>
          <li class="<?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"><a href="{{ route('fee') }}">پرداخت فیس</a></li>
          <li><a href="{{ route('fees') }}">لیست فیس</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-pencil-alt"></i></span>
          <span class="s-text">کارمندان</span>
        </a>
        <ul>
          <li><a href="/addEmployee">اضافه نمودن کارمند جدید</a></li>
          <li><a href="/employees">لیست کارمندان</a></li>
          <li><a href="/contacts">ارتباط با کارمند</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-menu-alt"></i></span>
          <span class="s-text">مالی</span>
        </a>
        <ul>
          <li><a href="{{ route('revenues') }}">عواید متفرقه</a></li>
          <li><a href="{{ route('expenses') }}">مصارف</a></li>
          <li><a href="/assets">اجناس</a></li>
          <li><a href="{{ route('blancess') }}">بیلانس مالی</a></li>
        </ul>
      </li>


      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="/addUser" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti ti-wheelchair"></i></span>
          <span class="s-text">اضافه نمودن کاربر جدید</span>
        </a>
      </li>


    </ul>
  </div>
</div>

<!-- Aside End -->
