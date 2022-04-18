<!-- Header -->
<header class="main-header " id="header">
<nav class="navbar navbar-static-top navbar-expand-lg">
  <button id="sidebar-toggler" class="sidebar-toggle">
    <span class="sr-only">Toggle navigation</span>
  </button>

 <div class="search-form d-none d-lg-inline-block"></div>

  <div class="navbar-right ">
    <ul class="nav navbar-nav">
      
      <!-- User Account -->
      <li class="dropdown user-menu">
        <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
          {{ Auth::user()->name }}<span class="d-none d-lg-inline-block"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <!-- header dropdown -->
          <li class="dropdown-header">
            <div class="d-inline-block">
            {{ Auth::user()->name }}<small class="pt-1">{{ Auth::user()->email}}</small>
            </div>
          </li>
          <li>
         
                    <li><a class="dropdown-item" href="{{ route ('adminProfile') }}"><i class="mdi mdi-account"></i><span class="ms-3">Profile Saya</span></a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-exit-to-app"></i><span class="ms-3">Keluar</span></a>
               
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>

        </ul>
      </li>
    </ul>
  </div>
</nav>
</header>


<!-- <li>
  <a href="#">
    <i class="mdi mdi-account"></i>Profile Saya</a>
</li>

<li>
  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i>Keluar</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
  </form>

</li> -->