<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("bootstrap/img/MAJALENGKA_1.jpg") ?>">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('bootstrap/') ?>css/slg.css" rel="stylesheet">
    <link href="<?= base_url('bootstrap/') ?>css/carousel.css" rel="stylesheet">
    <link href="<?= base_url('bootstrap/') ?>css/features.css" rel="stylesheet">

</head>

<body>
    <header>
        <?php $this->load->view('guest/navbar'); ?>
    </header>
    <main style="margin-top:0px">

        <?php $this->load->view('guest/' . $file); ?>

    </main>

    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; copyright 2021 | build with by. Andi Alfian
                        <p>Angkringan Wilayah Kabupaten Majalengka</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="<?= base_url() ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>