<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $judul ?></title>

    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/animate.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">

</head>

<body class="">

    <div id="wrapper">

        <?php $this->load->view('templates/menu') ?>


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">



                        <li>
                            <a href="<?= base_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin ingin logout?')">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <h2><?= $judul ?></h2>
                </div>
            </div>
            <div class="wrapper wrapper-content">

                <?= $this->session->flashdata('message'); ?>

                <?php $this->load->view($file) ?>
            </div>



            <div class="footer">
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?= base_url('assets/') ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.js"></script>
    <script src="<?= base_url('assets/') ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url('assets/') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FooTable -->
    <script src="<?= base_url('assets/') ?>js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url('assets/') ?>js/inspinia.js"></script>
    <script src="<?= base_url('assets/') ?>js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.footable').footable();
        });
    </script>
</body>

</html>