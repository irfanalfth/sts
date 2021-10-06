<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> <?= session()->get('nama_user') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header text-light">MAIN NAVIGATION</li>

      <li>
        <a href="<?= base_url('home') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('sts') ?>">
          <i class="fa fa-envelope"></i> <span>STS</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('arsip') ?>">
          <i class="fa fa-envelope"></i> <span>Arsip</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('laporan') ?>">
          <i class="fa fa-file"></i> <span>Laporan</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i> <span>Grafik</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('grafik') ?>"><i class="fa fa-bar-chart"></i> Total Grafik</a></li>
          <li><a href="<?= base_url('grafik/semua') ?>"><i class="fa fa-line-chart"></i> Semua Grafik</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('user') ?>">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">