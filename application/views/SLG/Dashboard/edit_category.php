<div class="col-lg-6">
    <form action="<?= base_url('Dashboard/edit_category/' . $kategori['id']) ?>" method="POST" class="mb-5">
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control <?php if (form_error('nama_kategori')) echo "is-invalid"; ?>" id="nama_kategori" value="<?= $kategori['nama_kategori'] ?>" autofocus>
            <?= form_error('nama_kategori', '<div class="invalid-feedback">', '</div>') ?>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
</div>