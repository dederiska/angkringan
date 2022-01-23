<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url('assets/') ?>css/animate.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">

</head>

<body class="black-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown card p-3 mt-5">
        <div>
            <?= $this->session->flashdata('message'); ?>
            <p>Silahkan untuk login terlebih dahulu.</p>
            <form class="m-t" role="form" action="<?= base_url('Auth') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="<?= base_url('Lupa_password') ?>"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= base_url('Auth/register') ?>">Create an account</a>
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