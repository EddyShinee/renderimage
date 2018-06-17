<!doctype html>
<html lang="en">
<header>
  @include('includes.head')
</header>
  <body class="hold-transition sidebar-mini">
  <div class="wrapper">
  @include('includes.navs.nav')

      <!-- sidebar content -->
      <div id="sidebar">
          @include('includes.sidebar.sidebar')
      </div>



      <!-- main content -->
      <div id="content">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                @include('includes.header')
                </div>
            </div>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        
        </div>
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