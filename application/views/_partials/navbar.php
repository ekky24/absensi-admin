<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo site_url('admin') ?>"><?php echo SITE_NAME ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <?php 
            if(!empty($this->session->userdata('email'))) {
              echo '<a class="dropdown-item" href="' . site_url('admin/ubah_password') . '">Ubah Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="' . site_url('admin/logout') . '">Logout</a>';
            }
            else {
              echo '<a class="dropdown-item" href="' . site_url('admin/login') . '">Login</a>'; 
            }
          ?>
          
        </div>
      </li>
    </ul>

  </nav>