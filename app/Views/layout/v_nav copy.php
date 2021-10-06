<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  <ul class="nav navbar-nav">
    <li class=""><a href="<?= base_url('home') ?>">Home</a></li>
    <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
    <li><a href="<?= base_url('arsip') ?>">Arsip</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">STS <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?= base_url('sts_reklame') ?>">Pajak Reklame</a></li>
        <li><a href="<?= base_url('sts') ?>">Pajak Restoran</a></li>
        <li><a href="<?= base_url('sts_hotel') ?>">Pajak Hotel</a></li>
        <li><a href="<?= base_url('sts_hiburan') ?>">Pajak Hiburan</a></li>
        <li><a href="<?= base_url('sts_ppj') ?>">Pajak PPJ</a></li>
        <li><a href="<?= base_url('sts_parkir') ?>">Pajak Parkir</a></li>
        <li><a href="<?= base_url('sts_air') ?>">Pajak Air Bawah Tanah</a></li>
        <li><a href="<?= base_url('sts_pbb') ?>">Pajak PBB</a></li>
        <li><a href="<?= base_url('sts_bphtb') ?>">Pajak BPHTB</a></li>
      </ul>
    </li>
    <!-- <li><a href="">Wajib Pajak</a></li> -->
    <li><a href="<?= base_url('user') ?>">User</a></li>
  </ul>
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
      <!-- Menu Toggle Button -->
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
      </a>
      <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
          <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">

          <p>
            <?= session()->get('nama_user') ?> - <?php if (session()->get('level') == 1) {
                                                    echo 'Admin';
                                                  } else {
                                                    echo 'User';
                                                  } ?>
            <small><?= date('l, d-m-Y') ?></small>
          </p>
        </li>
        <!-- Menu Body -->
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
          </div>
          <div class="pull-right">
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> BPPRD Kota Metro</a></li>
        <li class="active"><?= $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">