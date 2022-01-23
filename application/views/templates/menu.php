<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="<?= base_url('assets/') ?>img/UNCMA.jpg" width="48px" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?= $_SESSION['title'] ?></span>

                    </a>
                </div>
                <div class="logo-element">
                    A+
                </div>
            </li>


            <?php if ($_SESSION['id_role'] == '1') { ?>
                <li class="bg-success">
                    <a href="<?= base_url('Admin') ?>" class=" text-white"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li class="bg-success">
                    <a href="<?= base_url('Admin/angkringan') ?>" class=" text-white"><i class="fa fa-file-text"></i> <span class="nav-label">Manage Data</span></a>
                </li>
            <?php  } ?>


            <?php if ($_SESSION['id_role'] == '2') { ?>
                <li class="bg-success">
                    <a href="<?= base_url('Pembisnis') ?>" class=" text-white"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li li class="bg-success">
                    <a href="<?= base_url('Pembisnis/produk') ?>" class=" text-white"><i class="fa fa-list-alt"></i> <span class="nav-label">Produk Makanan</span></a>
                </li>
                <li li class="bg-success">
                    <a href="<?= base_url('Pembisnis/dokumentasi') ?>" class=" text-white"><i class="fa fa-camera"></i> <span class="nav-label">Dokumentasi</span></a>
                </li>
                <li li class="bg-success">
                    <a href="<?= base_url('Pembisnis/profil') ?>" class=" text-white"><i class="fa fa-bookmark"></i> <span class="nav-label">Profil Angkringan</span></a>
                </li>
            <?php } ?>


        </ul>
    </div>
</nav>