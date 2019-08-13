<!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item <?php echo $this->uri->segment(2) == null ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('user') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manajemen Anggota</span>
        </a>
      </li>
      <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('user/laporan') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Absen</span></a>
      </li>
    </ul>
