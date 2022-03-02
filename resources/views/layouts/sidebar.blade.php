<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

      <ul class="sidebar-menu" data-widget="tree"> 

        <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="fa fa-calendar-minus-o"></span> Beranda Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-school"></i>
            <span>Data Administrasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/siswa')}}"><i class="fa fa-circle-o"></i> Data Siswa </a></li>
            <li><a href="{{route('guru.index')}}"><i class="fa fa-circle-o"></i> Data Guru</a></li>
            <li><a href="{{route('kelas.index')}}"><i class="fa fa-circle-o"></i> Kelas </a></li>
            <li><a href="{{route('mapel.index')}}"><i class="fa fa-circle-o"></i> Mata Pelajaran</a></li>
          </ul>
        </li>

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>