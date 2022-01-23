<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <?php
            $sg = $this->uri->segment('2');
            ?>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == null) {
                                        echo 'active';
                                    }; ?>" aria-current="page" href="<?= base_url('Dashboard') ?>">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == 'category') {
                                        echo 'active';
                                    }; ?>" href="<?= base_url('Dashboard/category') ?>">
                    <span data-feather="file-text"></span>
                    Kategori Postingan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == 'posts') {
                                        echo 'active';
                                    }; ?>" href="<?= base_url('Dashboard/posts') ?>">
                    <span data-feather="file-text"></span>
                    Postingan Kegiatan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == 'pedagang') {
                                        echo 'active';
                                    }; ?>" href="<?= base_url('Dashboard/pedagang') ?>">
                    <span data-feather="file-text"></span>
                    Data UMKM
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == 'sosmed') {
                                        echo 'active';
                                    }; ?>" href="<?= base_url('Dashboard/sosmed') ?>">
                    <span data-feather="file-text"></span>
                    Akun Sosial Media
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == 'setting') {
                                        echo 'active';
                                    }; ?>" href="<?= base_url('Dashboard/setting') ?>">
                    <span data-feather="file-text"></span>
                    Pengaturan Sistem
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($sg == 'e_password') {
                                        echo 'active';
                                    }; ?>" href="<?= base_url('Dashboard/e_password') ?>">
                    <span data-feather="file-text"></span>
                    Ubah Password
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Auth/logout') ?>">
                    <span data-feather="log-out"></span> Logout
                </a>
            </li>
        </ul>

    </div>
</nav>