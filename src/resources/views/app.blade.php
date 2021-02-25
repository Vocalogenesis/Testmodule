<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Тесты</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/public/vocalogenesis/testmodule/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/public/vocalogenesis/testmodule/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('testmoduleIndex')}}" class="nav-link">Главная</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('testmoduleIndex')}}" class="nav-link">Все тесты</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('testmoduleIndex')}}" class="brand-link text-center">
      <span class="brand-text font-weight-light">Тесты</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          @auth
        <div class="image">
          <img src="{{asset('/public/vocalogenesis/testmodule/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
          @endauth
          @guest
        <div class="image">
          <img src="{{asset('/public/vocalogenesis/testmodule/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Гость</a>
        </div>
        @endguest
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Тесты
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('testmoduleCreateTest')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon" style="color: green;"></i>
                  <p>Новый тест</p>
                </a>
              </li>
              @foreach($tests as $test)
              <li class="nav-item">
                <a href="{{route('testmodulePreview', ['id' => $test['id']])}}" class="nav-link">
                  <i class="fas fa-circle nav-icon" style="font-size: 0.1rem;"></i>
                  <p>{{$test['name']}}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Предметы
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('testmoduleCreateObject')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon" style="color: green;"></i>
                  <p>Новый предмет</p>
                </a>
              </li>
              @foreach($objects as $object)
              <li class="nav-item">
                <a href="{{route('testmoduleSorted', ['id' => $object['id']])}}" class="nav-link">
                  <i class="fas fa-circle nav-icon" style="font-size: 0.1rem;"></i>
                  <p>{{$object['name']}}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper py-4">
    <div class="content">
        <div class="container-fluid">
        @yield('content')
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
        AdminLTE.io
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/public/vocalogenesis/testmodule/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/public/vocalogenesis/testmodule/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/public/vocalogenesis/testmodule/js/adminlte.min.js')}}"></script>
@if(Route::is('testmoduleCreateTest'))
<script src="{{asset('/public/vocalogenesis/testmodule/js/createElements.js')}}"></script>
@endif
</body>
</html>
