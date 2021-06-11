<aside class="control-sidebar-dark control-sidebar-dark main-sidebar sidebar-dark-primary elevation-4">
@if(Auth::user()->level )
<div class="sidebar">
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
                @if(Auth::user()->gambar == '')
                <img class="img-circle elevation-2"  src="dist/img/user2-160x160.jpg" alt="profile image">
                @else
                <img class="img-circle elevation-2"  src="{{asset('images/user/'.Auth::user()->gambar)}}" alt="profile image">
                @endif
            <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>

          <div class="info dropdown">
            <a class="d-block">Hello, {{Auth::user()->name}} !</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
          </div>
          <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">

                </div>
              </a>
              <a class="dropdown-item" style="margin-top: 20px;" href="{{route('user.edit', Auth::user()->id)}}">
               Edit Profile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 Sign Out

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </a>
            </div> -->
        </div>
  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  <li class="nav-item">
    <a href="{{route('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>

  <!-- Tim Yayasan -->
  <li class="nav-item has-treeview">
    <a href="" class="nav-link">
      <i class="nav-icon fas fa-user-friends"></i>
      <p>
        Tim Yayasan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('relawan.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Relawan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('perawat.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Perawat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('user.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Data Users</p>
        </a>
      </li>
    </ul>
  </li>

  <!-- absensi -->
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-user-clock"></i>
      <p>
        Absensi
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('absensi.index')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Daftar kehadiran</p>
        </a>
      </li>

    </ul>
  </li>
  <!-- absensi -->
  <li class="nav-item has-treeview">
    <a href="/" class="nav-link">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
        Jadwal
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a  href="{{route('jadwal.index')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Shift Perawat</p>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a href="{{route('jadwal_kerja.index')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Jadwal Perawat</p>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="{{route('jadwal_shift.index')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Jadwal Perawat</p>
        </a>
      </li>
       </ul>
  </li>
    <!-- absensi -->
    <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-star-half-alt"></i>
      <p>
        Penilaian
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('rating.index')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Relawan</p>
        </a>
      </li>
    </ul>
  </li>
   <!-- absensi -->
   <li class="nav-item has-treeview">
    <a href="" class="nav-link">
      <i class="nav-icon fas fa-user"></i>
      <p>
        SPK Penerimaan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('alternatif')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p> Alternatif </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('kriteria')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Kriteria </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('crip')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Crip</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('nilai')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Penilaian </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('perhitungan')}}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Hasil Ranking </p>
        </a>
      </li>
    </ul>
  </li>

  <!-- User -->
  <!-- <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-user"></i>
      <p>
        Users
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="./index.html" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
          <p>Admin</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="./index2.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>User</p>
        </a>
      </li>
    </ul>
  </li> -->
    </nav>
    </div>
    </aside>
@endif