<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/animate.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">

</head>

<body class="black-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown card p-3 mt-5">
        <div>
            <p>Create Account.</p>
            <form class="m-t" role="form" enctype="multipart/form-data" action="<?= base_url('Auth/register') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nama Angkringan" name="nama_angkringan" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone" name="phone" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Jam Buka-Tutup" name="jam_buka_tutup" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" required="">
                </div>
                <label>Upload Foto Angkringan</label>
                <div class="form-group">
                    <input type="file" class="form-control" placeholder="poto" name="image" id="image" required="">
                </div>
                <button type=" submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= base_url('Auth') ?>">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url('assets/') ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>