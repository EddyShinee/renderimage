<!doctype html>
<html lang="en">
<header>
  @include('includes.head')
</header>
  <body class="hold-transition sidebar-mini">
  <div class="wrapper">
  @include('includes.header')

      <!-- sidebar content -->
      <div id="sidebar">
          @include('includes.sidebar.sidebar')
      </div>

      <!-- main content -->
      <div id="content">
          @yield('content')
      </div>
    <footer class="main-footer">
        @include('includes.footer')
    </footer>
   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  @stack('script-footer')
  </body>
</html>