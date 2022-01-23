<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">

                <a href="<?= base_url('Pembisnis/i_dokumentasi') ?>" class="btn btn-primary">
                    Tambah Angkringan
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
                            <th>Dokumentasi Angkringan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampil as $t) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <img src="<?= base_url('cover/' . $t['cover']) ?>" alt="" height='200px' class="mb-1">
                                </td>
                                <td><?= $t['ket'] ?></td>
                                <td>
                                    <a href="<?= base_url('Pembisnis/hapus_dokumentasi/' . $t['id_dk']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        Hapus
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