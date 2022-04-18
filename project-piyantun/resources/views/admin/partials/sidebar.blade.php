<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a>        
        <span class="brand-name">Admin Dashboard</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div>

      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
         
        <li  class="has-sub" >
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
            aria-expanded="false" aria-controls="dashboard">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">Dashboard</span> <b class="caret"></b>
          </a>
          <ul  class="collapse"  id="dashboard"
            data-parent="#sidebar-menu">
            <div class="sub-menu">    
              <li>
                <a class="sidenav-item-link" href="{{ url('home') }}">
                  <span class="nav-text">General</span>
                </a>
              </li>         
            </div>
          </ul>
        </li>
        
      <li  class="has-sub" >
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
          aria-expanded="false" aria-controls="ui-elements">
          <i class="mdi mdi-folder-multiple-outline"></i>
          <span class="nav-text">Produk</span> <b class="caret"></b>
        </a>
        <ul  class="collapse"  id="ui-elements"
          data-parent="#sidebar-menu">
          <div class="sub-menu">
          
          <li >
            <a class="sidenav-item-link" href="{{ url('produk') }}">
              <span class="nav-text">Menejemen Produk</span>
            </a>
          </li>
          </div>
        </ul>
      </li>
      
      <li  class="has-sub" >
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
          aria-expanded="false" aria-controls="charts">
          <i class="mdi mdi-chart-pie"></i>
          <span class="nav-text">Grafik</span> <b class="caret"></b>
        </a>
        <ul  class="collapse"  id="charts"
          data-parent="#sidebar-menu">
          <div class="sub-menu"> 
            <li >
              <a class="sidenav-item-link" href="chartjs.html">
                <span class="nav-text">Grafik Penjualan</span>
              </a>
            </li>
          </div>
        </ul>
      </li>

      <li  class="has-sub" >
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
          aria-expanded="false" aria-controls="user">
          <i class="mdi mdi-account-supervisor"></i>
          <span class="nav-text">Akun Pengguna</span> <b class="caret"></b>
        </a>
        <ul  class="collapse"  id="user"
          data-parent="#sidebar-menu">
          <div class="sub-menu"> 
            <li >
              <a class="sidenav-item-link" href="{{ route ('akun_pengguna') }}">
                <span class="nav-text">Tabel Akun Pengguna</span>
              </a>
            </li>
          </div>
        </ul>
      </li>

      <li  class="has-sub" >
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation"
          aria-expanded="false" aria-controls="documentation">
          <i class="mdi mdi-book-open-page-variant"></i>
          <span class="nav-text">Dokumentasi</span> <b class="caret"></b>
        </a>
        <ul  class="collapse"  id="documentation"
          data-parent="#sidebar-menu">
          <div class="sub-menu">
                <li >
                  <a class="sidenav-item-link" href="introduction.html">
                    <span class="nav-text">Pengeluaran</span>
                  </a>
                </li>

                <li >
                  <a class="sidenav-item-link" href="quick-start.html">
                    <span class="nav-text">Pemesanan</span>
                  </a>
                </li>
          </div>
        </ul>
      </li>
  </ul>
</div>
<hr class="separator" />
<div class="sidebar-footer">
  <div class="sidebar-footer-content">
    <div></div>
    <div></div>
  </div>
</div>
</div>
</aside>
        


        

        