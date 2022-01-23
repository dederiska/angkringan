<div class="container">
    <div class="row my-3">
        <div class="card col-md-8">
            <div class="card-body">
                <h4><?= $post['judul'] ?></h4>
                <p class="text-muted"><?= $post['author'] ?>, <?= $post['created_at'] ?> </p>
                <div style="max-height: 350px; overflow:hidden;margin-top:-20px;">
                    <img src="<?= base_url('image/' . $post['image']) ?>" alt="<?= $post['nama_kategori'] ?>" class="img-fluid mt-3">
                </div>
                <article class="my-3 fs-6 text-dark" style="text-align:justify;">
                    <?= $post['body'] ?>
                </article>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <?php
                $galeri = $this->db->get_where('galeri', ['id_post' => $post['id']])->result_array();
                foreach ($galeri as $f) {
                ?>
                    <img src="<?= base_url('galeri/' . $f['foto']) ?>" alt="" class="img-thumbnail">
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>