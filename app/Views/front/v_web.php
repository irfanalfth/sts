<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/gambar/metro.png">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/skins/_all-skins.min.css">
    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/price_rangs.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url() ?>/gambar/Metro.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?= base_url() ?>">
                                    <h1>
                                        <font style="color:red">ARSIP</font>PAJAK
                                    </h1>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="<?= base_url() ?>">Home</a></li>
                                            <li><a href="<?= base_url('web/about') ?>">About</a></li>
                                            <li><a href="<?= base_url('web/contact') ?>">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <li><a href="<?= base_url('auth') ?>" class="btn head-btn2">Login</a></li>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <!-- digunakan untuk menampilkan body dari halaman -->
    <?= view($body) ?>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4><?= $title ?></h4>
                                    <div class="footer-pera">
                                        <p>Badan Pengelolaan Pajak dan Retribusi Daerah mempunyai tugas dan kewajiban membantu Walikota dalam menyelengarakan urusan bidang pengelolaan pajak dan retribusi.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Hubungi Kami</h4>
                                <ul>
                                    <li>
                                        <p>Alamat : Jl. A.H. Nasution No. 05, Kota Metro, Provinsi Lampung</p>
                                    </li>
                                    <li><a href="#">Phone : 0725-41001</a></li>
                                    <li><a href="#">Fax : 0725-41001</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15895.742708779499!2d105.3079944!3d-5.1140696!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2133c2698824ef25!2sBPPRD%20METRO!5e0!3m2!1sid!2sid!4v1628104512474!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                                <p>Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | <?= $title ?> </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->
    <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="<?= base_url() ?>/template/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= base_url() ?>/template/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= base_url() ?>/template/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= base_url() ?>/template/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/slick.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/price_rangs.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="<?= base_url() ?>/template/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/animated.headline.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="<?= base_url() ?>/template/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="<?= base_url() ?>/template/assets/js/contact.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/jquery.form.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/mail-script.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= base_url() ?>/template/assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/main.js"></script>
    <script src="/alert.js"></script>
    <?php echo "<script>" . session()->getFlashdata('message') . "</script>" ?>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>