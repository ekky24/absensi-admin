<!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
      <li class="nav-item active <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Overview</span>
        </a>
      </li>
      <li class="nav-item <?php echo $this->uri->segment(2) == 'setting' ? 'active': '' ?>">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
      </li>
    </ul>
