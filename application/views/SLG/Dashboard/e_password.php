<div class="col-lg-6">
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('Dashboard/e_password') ?>" method="POST" class="mb-5">
        <div class="mb-3">
            <label for="old_password" class="form-label">Password Lama</label>
            <input type="password" name="old_password" class="form-control <?php if (form_error('old_password')) echo "is-invalid"; ?>" id="old_password">
            <?= form_error('old_password', '<div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" name="new_password" class="form-control <?php if (form_error('new_password')) echo "is-invalid"; ?>" id="new_password">
            <?= form_error('new_password', '<div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Konfirmasi Password</label>
            <input type="password" name="confirm" class="form-control <?php if (form_error('confirm')) echo "is-invalid"; ?>" id="confirm">
            <?= form_error('confirm', '<div class="invalid-feedback">', '</div>') ?>
        </div>
        <button class="btn btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin mengubah password?')">Simpan</button>
    </form>
</div>