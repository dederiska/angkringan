<div class="col-md-12">

    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('Dashboard/create_pedagang') ?>" class="btn btn-primary mb-3">Tambah Pedagang Baru</a>
    <div class="table-responsive">
        <table id="datatable-responsive" class="table table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Penjualan</th>
                    <th scope="col">Pemilik</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">--</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pedagang as $t) {
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?>.</td>
                        <td>
                            <a href="<?= base_url('Dashboard/show_pedagang/' . $t['id']) ?>" class="text-decoration-none">
                                <?= $t['nama_penjualan'] ?>
                            </a>
                        </td>
                        <td><?= $t['pemilik'] ?></td>
                        <td><?= $t['alamat'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('Dashboard/edit_pedagang/' . $t['id']) ?>" class="btn btn-warning btn-sm">
                                <span data-feather="edit"></span> Edit
                            </a>
                            <a href="<?= base_url('Dashboard/del_pedagang/' . $t['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <span data-feather="x-circle"></span> Hapus
                            </a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>