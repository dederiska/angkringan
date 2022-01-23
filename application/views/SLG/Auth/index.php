<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/img/") . $sid['logo'] ?>">
    <title><?= $title ?></title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="<?= base_url('assets/') ?>css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <?= $this->session->flashdata('message'); ?>
        <form method="POST" action="<?= base_url("Auth") ?>">
            <img class="mb-4" src="<?= base_url('assets/img/') ?>knm.jpg" alt="" width="100">

            <div class="form-floating">
                <input type="username" class="form-control" id="floatingInput" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; copyright 2021
                <br>build with by. Andi Alfian
                <br> Program Kerja Mahasiswa KNM UNMA 2021
            </p>
        </form>
    </main>


</body>

</html>