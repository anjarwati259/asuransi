  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
    <div class="container">
      <a href="<?php echo base_url() ?>assets/index3.html" class="navbar-brand">
        <span class="brand-text font-weight-light"><strong>Arsmedika</strong></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <?php if($this->session->userdata('hak_akses')=='1'){ ?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin'); ?>" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/customer'); ?>" class="nav-link">Customer</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/kelas'); ?>" class="nav-link">Kelas</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Produk</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url('admin/produk'); ?>" class="dropdown-item">Data Produk </a></li>
              <li><a href="<?php echo base_url('admin/detail_produk'); ?>" class="dropdown-item">Daftar Harga</a></li>

            </ul>
          </li>
        <?php }else if($this->session->userdata('hak_akses')=='2'){ ?>
          <li class="nav-item">
            <a href="<?php echo base_url('kasir'); ?>" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('kasir/klaim'); ?>" class="nav-link">Klaim Asuransi</a>
          </li>
        <?php } ?>
          <li class="nav-item">
            <a href="<?php echo base_url('kasir/detail_klaim'); ?>" class="nav-link">Riwayat Klaim</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span><?php echo $this->session->userdata('nama_user'); ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">
              <i class="fa fa-lock mr-2"></i>Logout
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <?php echo $title ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->