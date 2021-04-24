<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="">
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Admin Klinik
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Akun</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Akun</h6>
            <a class="collapse-item" href="{{url('/klinik')}}">Klinik</a>
            <a class="collapse-item" href="{{url('/member')}}">Member</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/produk')}}" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Produk</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Produk</h6>
            <a class="collapse-item" href="{{url('/produk')}}">Produk</a>
            <a class="collapse-item" href="{{url('/pemesanan_produk')}}">Pemesanan Produk</a>
            <a class="collapse-item" href="{{url('/pembayaran_produk')}}">Pembayaran Produk</a>

          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/treatment')}}" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Treatment</span>
        </a>
        
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Treatment</h6>
            <a class="collapse-item" href="{{url('/treatment')}}">Treatment</a>
            <a class="collapse-item" href="{{url('/pemesanan_treatment')}}">Pemesanan Treatment</a>
            <a class="collapse-item" href="{{url('/pemesanan_treatment')}}">Pembayaran Produk</a>

          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/antrian')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Antrian</span>
        </a>
      </li>
      <div class="sidebar-heading">
      </div>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>