<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('Desa') ?>"><?= $sid['nama_desa'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                $sg = $this->uri->segment('2');
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($sg == null) {
                                            echo 'active';
                                        }; ?>" href="<?= base_url('Desa') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($sg == 'sejarah') {
                                            echo 'active';
                                        }; ?>" href="<?= base_url('Desa/sejarah') ?>">Sejarah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($sg == 'profil') {
                                            echo  'active';
                                        }; ?>" href="<?= base_url('Desa/profil') ?>">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($sg == 'visimisi') {
                                            echo  'active';
                                        }; ?>" href="<?= base_url('Desa/visimisi') ?>">Visi & Misi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($sg == 'potensi') {
                                            echo  'active';
                                        }; ?>" href="<?= base_url('Desa/potensi') ?>">Potensi Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($sg == 'umkm') {
                                            echo  'active';
                                        }; ?>" href="<?= base_url('Desa/umkm') ?>">UMKM</a>
                </li>
            </ul>
        </div>
    </div>
</nav>