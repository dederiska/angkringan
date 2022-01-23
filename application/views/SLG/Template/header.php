<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/img/") . $sid['logo'] ?>">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/') ?>css/slg.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/carousel.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/features.css" rel="stylesheet">

</head>

<body>
    <header>
        <?php $this->load->view('template/navbar'); ?>
    </header>
    <main style="margin-top:0px">