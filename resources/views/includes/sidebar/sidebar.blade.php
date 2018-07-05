 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Render Ảnh</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ẩn danh</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Quản lý hình ảnh
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! Asset('images') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Danh sách ảnh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! Asset('upload') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Upload ảnh</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-font"></i>
              <p>
                Quản lý Fonts
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! Asset('fonts') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Danh sách Fonts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! Asset('font-upload') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Upload Font</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Render Ảnh
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!! Asset('render') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Render</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- Quản lý file name -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Quản lý file name
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! Asset('upload-filename') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Upload File Name</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{!! Asset('list-file-name') !!}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- end Quản lý file name -->
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
