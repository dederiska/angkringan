<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url('assets/') ?>css/animate.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">

</head>

<body class="black-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown card p-3 mt-5">
        <div>
            <?= $this->session->flashdata('message'); ?>
            <p>Silahkan tulis email terlebih dahulu.</p>
            <form class="m-t" role="form" action="<?= base_url('Auth/forgotPassword') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="email" autofocus>
                    <?= form_error('email', '<div class="col-12"><small class="text-warning">', '</small></div>') ?>

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="<?= base_url('Auth') ?>"><small>Login</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url('assets/') ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.js"></script>

</body>

</html>