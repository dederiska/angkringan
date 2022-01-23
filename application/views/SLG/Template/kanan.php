<div class="col-md-4">
    <!-- PENCARIAN -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5>Pencarian</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Desa/find') ?>" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Ketik Judul postingan.." value="<?= set_value('search') ?>">
                    <button class="btn btn-primary" type="submit" id="button-addon2">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- GALERI -->
    <div class="card mb-3">
        <div class="card-header bg-danger text-white">
            <h5>Galeri Foto</h5>
        </div>
        <div class="card-body">
            <?php
            foreach ($galeri as $g) {
            ?>
                <a href="<?= base_url("Desa/post/" . $g['slug']) ?>">

                    <img src="<?= base_url('galeri/' . $g['foto']) ?>" class="img-fluid mb-1" width="48%">
                </a>
            <?php
            }
            ?>
        </div>

    </div>
    <!-- MEDIA SOSIAL -->
    <div class="card mb-3">
        <div class="card-header bg-warning">
            <h5>Media Sosial</h5>
        </div>
        <div class="card-body">
            <?php
            foreach ($sosmed as $ms) {
            ?>
                <a href="<?= $ms['link'] ?>" alt="<?= $ms['title'] ?>">
                    <img src="<?= base_url('assets/img/' . $ms['logo']) ?>" alt="<?= $ms['title'] ?>" width="50px" class="d-inline m-1">
                </a>
            <?php } ?>
        </div>
    </div>
    <!-- ADUAN MASYARAKAT -->
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <h5>Aduan Masyarakat</h5>
        </div>
        <div class="card-body">
            Silahkan sampaikan keluh kesah anda dengan mengisi formulir secara lengkap.
            <p class="text-center mt-2">
                <a href="#" class="btn btn-primary">BUAT FORMULIR !!!</a>
            </p>
        </div>
    </div>

</div>