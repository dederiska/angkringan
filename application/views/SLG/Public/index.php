<?php $this->load->view('template/umkm3'); ?>

<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>
                        <a href="<?= base_url('Desa/post/' . $npost['slug']) ?>" class="text-decoration-none text-dark">
                            <?= $npost['judul'] ?>
                        </a>
                    </h5>
                </div>
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?= base_url('image/' . $npost['image']) ?>" alt="<?= $npost['nama_kategori'] ?>" class="img-fluid">
                </div>
                <div class="card-body text-center">
                    <p> <small class="text-muted"><a href="/posts?author=18.14.1.0001" class="text-decoration-none"><?= $npost['author'] ?>,</a> in
                            <a href="<?= base_url("Desa/category/" . $npost['id_kategori']) ?>" class="text-decoration-none">
                                <?= $npost['nama_kategori'] ?>
                            </a>
                            6 days ago
                        </small>
                    </p>
                    <p class="card-text">
                        <?= $npost['body'] ?>
                    </p>
                </div>
            </div>

            <?php $this->load->view('template/artikel_terkini'); ?>

        </div>


        <?php $this->load->view('template/kanan'); ?>

    </div>

</div>