<div class="container">
    <div class="row my-3">
        <div class="card col-md-8">
            <div class="card-body">

                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?= base_url('image2/' . $pedagang['image']) ?>" alt="<?= $pedagang['nama_penjualan'] ?>" class="img-fluid mt-3">
                </div>


                <table class="table mt-4">
                    <tr>
                        <td>Nama Pemilik</td>
                        <td>: <?= $pedagang['pemilik'] ?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>: <?= $pedagang['telp'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $pedagang['alamat'] ?></td>
                    </tr>
                </table>
                <article class="my-3 fs-6" style="text-align:justify;">
                    <?= $pedagang['deskripsi'] ?>
                </article>
                <div class="text-muted text-right border-top">
                    Dibuat pada : <?= $pedagang['created_at'] ?></br>
                    Diubah pada : <?= $pedagang['updated_at'] ?>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <?php
                foreach ($galeri as $f) {
                ?>
                    <img src="<?= base_url('galeri2/' . $f['foto']) ?>" alt="" class="img-thumbnail">
                    <p class="text-center"><b><?= $f['caption'] ?></b></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>