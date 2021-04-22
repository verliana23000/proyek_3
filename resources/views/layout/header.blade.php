<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="">
                  <div class="input-group">
                    <div class="input-group-append">
                    </div>
                  </div>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                    <span class="font-weight-bold"></span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">
                    </div>
                    </div>
                </a>
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                  </div>
                </a>
              </div>
            </li>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                </h6>
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="" style="" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"></div>
                    <div class="small text-gray-500"></div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <div class="status-indicator bg-default"></div>
                  </div>
                  <div>
                    <div class="text-truncate"></div>
                    <div class="small text-gray-500"></div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#"></a>
              </div>
            </li>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                  <div class="mb-3">
                    <div class="small text-gray-500">
                      <div class="small float-right"><b></b></div>
                    </div>
                    <div class="" style="">
                    <div class="-bar bg-success" role="" style="" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="small text-gray-500">
                    </div>
                  </div>
              </div>
            <div class="btn-group">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
            <img width="42" class="rounded-circle" src="{{ url('admin/assets/images/avatars/'.Session::get('foto')) }}" alt="">
            <b>{{Session::get('nama')}}</b>
            <i class="fa fa-angle-down ml-2 opacity-8"></i>
            </a>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
            <a href="{{url ('/admin/UbahProfile')}}{{Session::get('id_admin')}}" tabindex="0" class="dropdown-item">Ubah Profil</a>
            <div tabindex="-1" class="dropdown-divider">
            </div>
            <a href="{{ url ('logout') }}" tabindex="0" class="dropdown-item">Log Out</a>
            </div>
            </li>
          </ul>
        </nav>