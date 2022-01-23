<div class="col-md-12">

    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">Sosial Media</th>
                    <th scope="col">Link</th>
                    <th scope="col">ID / Nomor</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Status</th>
                    <th scope="col">--</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sosmed as $t) {
                ?>
                    <tr>
                        <form action="<?= base_url('Dashboard/p_sosmed/' . $t['id']) ?>" method="POST">
                            <td class="text-center">
                                <img src="<?= base_url('assets/img/' . $t['logo']) ?>" alt="" width="50px" class="d-inline m-1">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?= $t['link'] ?>" name="link">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?= $t['username'] ?>" name="username">
                            </td>
                            <td>
                                <input type="text" class="form-control" value=" <?= $t['title'] ?>" name="title">
                            </td>
                            <td class="text-center">
                                <?php
                                if ($t['status'] == '1') {
                                ?>
                                    <a href="<?= base_url("Dashboard/is_active/" . $t['id'] . "/0") ?>" class="btn btn-success btn-sm">Aktif</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= base_url("Dashboard/is_active/" . $t['id'] . "/1") ?>" class="btn btn-danger btn-sm">Non-aktif</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary m-2" onclick="return confirm('Anda yakin ingin menyimpan perubahan data sosial media ini?')">Simpan</button>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>