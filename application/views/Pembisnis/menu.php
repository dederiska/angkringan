<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">

                <a href="<?= base_url('Pembisnis/i_produk') ?>" class="btn btn-primary">
                    Tambah Produk
                </a>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <table class="footable table table-stripped toggle-arrow-tiny">
                    <thead>
                        <tr>
                            <th data-toggle="true">No</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampil as $t) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $t['nama_produk'] ?></td>
                                <td><?= $t['harga'] ?></td>
                                <td>
                                    <?php
                                    if ($t['status'] == '1') {
                                    ?>
                                        <a href="#"><i class="fa fa-check text-navy"></i></a>

                                    <?php
                                    } else {
                                    ?>
                                        <a href="#" class="text-danger">Tidak Ada</a>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="<?= base_url('Pembisnis/hapus_produk/' . $t['id_menu']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        Hapus
                                    </a>
                                    <a href="<?= base_url('Pembisnis/edit_produk/' . $t['id_menu']) ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin edit data ini?')">
                                        Edit
                                    </a>
                                </td>

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

            </div>
        </div>
    </div>
</div>