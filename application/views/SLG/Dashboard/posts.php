<div class="col-md-12">

    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('Dashboard/create_post') ?>" class="btn btn-primary mb-3">Buat Postingan Baru</a>
    <div class="table-responsive">
        <table id="datatable-responsive" class="table table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($posts as $t) {
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?>.</td>
                        <td>
                            <a href="<?= base_url('Dashboard/post/' . $t['id']) ?>" class="text-decoration-none">
                                <?= $t['judul'] ?>
                            </a>
                        </td>
                        <td><?= $t['nama_kategori'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('Dashboard/edit_post/' . $t['id']) ?>" class="btn btn-warning btn-sm">
                                <span data-feather="edit"></span> Edit
                            </a>
                            <a href="<?= base_url('Dashboard/del_post/' . $t['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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