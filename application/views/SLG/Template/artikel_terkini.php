<div class="card">

    <div class="card-header">
        <h5>
            <a href="<?= base_url('Desa/posts') ?>" class="text-decoration-none">
                Artikel Terkini
            </a>
        </h5>
    </div>
    <div class="card-body">

        <?php
        $no = 1;
        foreach ($posts as $t) {
            if ($no > 1) {
        ?>

                <div class="row mb-3 pb-2 border-bottom">
                    <div class="col-md-5">
                        <div class="position-absolute px-3 px-2" style="background-color:rgba(0,0,0,0.7)">
                            <a href="<?= base_url("Desa/category/" . $t['id_kategori']) ?>" class="text-white text-decoration-none">
                                <?= $t['nama_kategori'] ?>
                            </a>
                        </div>

                        <img src="<?= base_url('image/' . $t['image']) ?>" alt="<?= $t['nama_kategori'] ?>" class="img-fluid">
                    </div>
                    <div class="col-md-7">

                        <div class="card-title">
                            <a href="<?= base_url('Desa/post/' . $t['slug']) ?>" class="text-decoration-none"><?= $t['judul'] ?>
                            </a>
                        </div>
                        <p>oleh <?= $t['author'] ?>, <?= $t['created_at'] ?></p>
                        <p class="card-text">
                            <?php
                            $exc = preg_replace("<</div>>", " ", $t['exc']);
                            echo $exc; ?>
                        </p>
                        <a href="<?= base_url('Desa/post/' . $t['slug']) ?>" class="text-decoration-none"> Baca Selengkapnya...</a>
                    </div>
                </div>

        <?php }
            $no++;
        } ?>
        <div class="row">
            <div class="col-md-12 text-center pt-2">
                <a href="<?= base_url("Desa/posts") ?>" class="btn btn-primary">Artikel Lainnya</a>
            </div>
        </div>
    </div>

</div>