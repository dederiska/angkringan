<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">

                <a href="<?= base_url('Admin/i_angkringan') ?>" class="btn btn-primary">
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
                            <th>Nama Angkringan</th>
                            <th>Nama Pemilik</th>
                            <th>Phone</th>
                            <th>Jam Buka-Tutup</th>
                            <th data-hide="all">Alamat</th>
                            <th data-hide="all">Cover</th>
                            <th data-hide="all">Aksi</th>
                            <th>Accept</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampil as $t) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $t['nama_angkringan'] ?></td>
                                <td><?= $t['nama_pemilik'] ?></td>
                                <td><?= $t['phone'] ?></td>
                                <td><?= $t['jam_buka_tutup'] ?></td>
                                <td><?= $t['alamat'] ?></td>
                                <td>
                                    <img src="<?= base_url('cover/' . $t['cover']) ?>" alt="" height='250px' class="mb-1">
                                </td>
                                <td>
                                    <a href="<?= base_url('Admin/hapus_angkringan/' . $t['id_angkringan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        Hapus
                                    </a>
                                    <a href="<?= base_url('Admin/edit_angkringan/' . $t['id_angkringan']) ?>" class="btn btn-info btn-sm">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    if ($t['accept'] == '1') {
                                    ?>
                                        <a href="<?= base_url('Admin/accepted/0/' . $t['id_angkringan']) ?>"><i class="fa fa-check text-navy"></i></a>

                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url('Admin/accepted/1/' . $t['id_angkringan']) ?>" class="text-danger">Non Accepted</a>
                                    <?php
                                    }
                                    ?>

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