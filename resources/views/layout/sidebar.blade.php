<aside class="control-sidebar-dark control-sidebar-dark main-sidebar sidebar-dark-primary elevation-4" style="background-color:#005555">
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

  <li class="nav-item">
    <a href="{{route('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  @if(Auth::user()->level == 'admin')
  <!-- Tim Yayasan -->
  <li class="nav-item has-treeview">
    <a href="" class="nav-link">
      <i class="nav-icon fas fa-user-friends"></i>
      <p>
        Master Data
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('relawan.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon fa-xs" style="font-size:10px;" ></i>
          <p>Relawan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('perawat.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Perawat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('user.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p> Users</p>
        </a>
      </li>
    </ul>
  </li>
  @endif
  <!-- ABSENSI -->
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
        <a href="{{route('absensi.index')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Daftar kehadiran</p>
        </a>
      </li>

    </ul>
  </li>
  <!-- JADWAL -->
  <li class="nav-item has-treeview {{ Request::is('products*') ? 'active' : '' }}">
    <a href="/" class="nav-link">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
        Jadwal
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a  href="{{route('jadwal.index')}}" class="nav-link ">
          <i class="far fa-circle nav-icon " style="font-size:10px;"></i>
          <p>Shift Perawat</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('jadwal_shift.index')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Jadwal Perawat</p>
        </a>
      </li>
       </ul>
  </li>
    <!-- REWARD -->
    <li class="nav-item has-treeview">
    <a href="/" class="nav-link">
      <i class="nav-icon fas fa-star-half-alt"></i>
      <p>
        Penilaian
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('rating.index')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Reward Relawan</p>
        </a>
      </li>
    </ul>
  </li>
   <!-- SPK -->
   @if(Auth::user()->level == 'admin')

   <li class="nav-item has-treeview">
    <a href="" class="nav-link">
      <i class="nav-icon fas fa-user-nurse"></i>
      <p>
        Seleksi Calon Perawat
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('alternatif')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p> Alternatif/Calon Perawat </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('kriteria')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Kriteria </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('crip')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Crip/Skala Nilai</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('nilai')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Penilaian </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('perhitungan')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Hasil Seleksi </p>
        </a>
      </li>
    </ul>
  </li>
  <!-- REWARD -->
  <!-- <li class="nav-item has-treeview">
    <a href="/" class="nav-link">
      <i class="nav-icon fas fa-star-half-alt"></i>
      <p>
        Laporan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{url('laporan/perawat')}}" class="nav-link ">
          <i class="far fa-circle nav-icon" style="font-size:10px;"></i>
          <p>Laporan Perawat</p>
        </a>
      </li>
    </ul>
  </li> -->
@endif

    </nav>
    </div>
    </aside>
@endif

