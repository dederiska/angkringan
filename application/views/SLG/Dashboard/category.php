<div class="table-responsive col-lg-7">

    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('Dashboard/create_category') ?>" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
    <div class="table-responsive">

        <table id="datatable-responsive" class="table table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($category as $t) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['nama_kategori'] ?></td>
                        <td>
                            <a href="<?= base_url('Dashboard/show_category/' . $t['id']) ?>" class="btn btn-info btn-sm">
                                <span data-feather="eye"></span> Lihat</a>
                            <a href="<?= base_url('Dashboard/edit_category/' . $t['id']) ?>" class="btn btn-warning btn-sm">
                                <span data-feather="edit"></span> Edit
                            </a>
                            <a href="<?= base_url('Dashboard/del_category/' . $t['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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