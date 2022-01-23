<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SID | <?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/img/") . $sid['logo'] ?>">

    <link href="<?= base_url() ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>trix/trix.css">
    <script type="text/javascript" src="<?= base_url() ?>trix/trix.js"></script>

    <link href="<?= base_url('table/') ?>css/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php $this->load->view('Partials/navbar'); ?>

    <div class="container-fluid">
        <div class="row">

            <?php $this->load->view('Partials/sidebar') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"> <?= $title ?></h1>
                </div>