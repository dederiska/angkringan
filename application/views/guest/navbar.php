<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Angkringan Majalengka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                $sg = $this->uri->segment('2');
                ?>
                <!-- <li class="nav-item">
                    <a class="nav-link <?php if ($sg == null) {
                                            echo 'active';
                                        }; ?>" href="<?= base_url('AK') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($sg == 'profil') {
                                            echo  'active';
                                        }; ?>" href="<?= base_url('AK/') ?>">Profil</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link  <?php if ($sg == 'visimisi') {
                                            echo  'active';
                                        }; ?>" href="<?= base_url('Auth') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>