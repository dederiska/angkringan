<div class="container">
    <div class="row my-3">
        <div class="card col-md-8">
            <div class="card-body">

                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?= base_url('cover/' . $tampil['cover']) ?>" alt="<?= $tampil['nama_angkringan'] ?>" class="img-fluid mt-3">
                </div>


                <table class="table mt-4">
                    <tr>
                        <td>Nama Angkringan</td>
                        <td>: <?= $tampil['nama_angkringan'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pemilik</td>
                        <td>: <?= $tampil['nama_pemilik'] ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>: <?= $tampil['phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $tampil['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>Jam Buka-Tutup</td>
                        <td>: <?= $tampil['jam_buka_tutup'] ?></td>
                    </tr>
                </table>
                <article class="my-3 fs-6" style="text-align:justify;">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th data-toggle="true">No</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($menu as $t) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $t['nama_produk'] ?></td>
                                    <td><?= $t['harga'] ?></td>

                                </tr>

                            <?php $no++;
                            endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </article>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <?php
                foreach ($galeri as $f) {
                ?>
                    <img src="<?= base_url('cover/' . $f['cover']) ?>" alt="" class="img-thumbnail">
                    <p class="text-center"><b><?= $f['ket'] ?></b></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>