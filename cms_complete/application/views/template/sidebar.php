
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>themes/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FISIPKOM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Logged As <b><?php echo $this->session->userdata('username');?></b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('/dashboard');?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('/fakultas');?>" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Fakultas
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="<?php echo base_url('prodi');?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Program Studi
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="<?php echo base_url('mahasiswa');?>" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>
		  
					<li class="nav-item">
            <a href="<?php echo base_url('users');?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
			</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
