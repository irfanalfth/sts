<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/styleee.css">

    <title>Login | Admin</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url() ?>/images/logo.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Login</h3>
                                <p class="mb-4">Silahkan Login.</p>
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <ul>
                                            <?php foreach ($errors as $key => $value) { ?>
                                                <li><?= esc($value) ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-danger alert-dismissible">';
                                    echo session()->getFlashdata('pesan');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <?php echo form_open('auth/login') ?>
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="nama_user" id="username">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">

                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">

                            <?php echo form_close() ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>/template/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/popperrr.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/bootstrappp.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/mainnn.js"></script>
</body>

</html>