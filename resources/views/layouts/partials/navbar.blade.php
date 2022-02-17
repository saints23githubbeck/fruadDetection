<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="{{route('home')}}" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @if(auth()->user()->image)
          <img src="{{Storage::url(auth()->user()->image)}}" alt="user-image" class="shadow-sm brand-image img-circle " width="40" height="40" style="opacity: .8">
            @else
            <img src="{{ asset('images/logo.png') }}" alt="user-image" class="rounded shadow-sm " width="30">
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-header noti-title">
            <i class="nav-icon fas fa-user"></i>
            <span class="text-overflow m-1">{{ auth()->user()->getFullname() }}</span>
          </div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-header noti-title text-left">
            <a href="{{route('user.profile.show')}}" class="text-decoration-none">
              <i class="nav-icon fas fa-edit"></i>
              <span class="text-overflow m-1">Update Profile</span>
            </a>
          </div>
          <div class="dropdown-divider"></div>

          <!-- item-->
          <a href="{{route('logout')}}"
             onclick="event.preventDefault();document.getElementById('logout-form').submit();"
             class="dropdown-item notify-item text-center  text-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>



          </div>

      </li>
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
          {{--<i class="fas fa-th-large"></i>--}}
        {{--</a>--}}
      {{--</li>--}}
    </ul>
  </nav>
  <!-- /.navbar -->
