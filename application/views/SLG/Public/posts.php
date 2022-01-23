<div class="container">
    <div class="row my-3">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3><?= $title ?></h3>
                </div>
            </div>
            <div class="row my-3">

                <?php foreach ($posts as $t) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 px-2" style="background-color:rgba(0,0,0,0.7)">
                                <a href="<?= base_url("Desa/category/" . $t['id_kategori']) ?>" class="text-white text-decoration-none">
                                    <?= $t['nama_kategori'] ?>
                                </a>
                            </div>
                            <img src="<?= base_url('image/' . $t['image']) ?>" alt="<?= $t['nama_kategori'] ?>" class="img-fluid card-img-top">
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="<?= base_url('Desa/post/' . $t['slug']) ?>" class="text-decoration-none"><?= $t['judul'] ?>
                                    </a>
                                </div>
                                <p> oleh <?= $t['author'] ?>, <?= $t['created_at'] ?>
                                </p>
                                <p class="card-text">
                                    <?php
                                    $exc = preg_replace("<</div>>", " ", $t['exc']);
                                    echo $exc; ?>...
                                </p>
                                <a href="<?= base_url('Desa/post/' . $t['slug']) ?>" class="text-decoration-none"> Baca selengkapnya...</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <div class="d-flex justify-content-center">
                    <?= $pagination; ?>
                </div>
            </div>
        </div>

        <?php $this->load->view('template/kanan'); ?>

    </div>
</div>