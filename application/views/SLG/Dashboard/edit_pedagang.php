<div class="col-lg-8">

    <form action="<?= base_url('Dashboard/edit_pedagang/' . $pedagang['id']) ?>" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_penjualan" class="form-label">Nama Penjualan / Usaha / Toko / Kios</label>
            <input type="text" name="nama_penjualan" class="form-control <?php if (form_error('nama_penjualan')) echo "is-invalid"; ?>" id="nama_penjualan" autofocus value="<?= $pedagang['nama_penjualan'] ?>">
            <?= form_error('nama_penjualan', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="pemilik" class="form-label">Nama Pemilik</label>
            <input type="text" name="pemilik" class="form-control <?php if (form_error('pemilik')) echo "is-invalid"; ?>" id="pemilik" value="<?= $pedagang['pemilik'] ?>">
            <?= form_error('pemilik', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <input type="text" name="alamat" class="form-control <?php if (form_error('alamat')) echo "is-invalid"; ?>" id="alamat" value="<?= $pedagang['alamat'] ?>">
            <?= form_error('alamat', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Nomor Telepon / WA</label>
            <input type="text" name="telp" class="form-control <?php if (form_error('telp')) echo "is-invalid"; ?>" id="telp" autofocus value="<?= $pedagang['telp'] ?>">
            <?= form_error('telp', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto</label><br>
            <img class="img-preview img-fluid mb-3 col-sm-5" src="<?= base_url('image2/' . $pedagang['image']) ?>">
            <input type="file" class="form-control imgInput  <?php if (form_error('image')) echo "is-invalid"; ?>" id="image" name="image" onchange="previewImage()">
            <?= form_error('image', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi</label>
            <input type="hidden" id="body" name="body" value="<?= $pedagang['deskripsi'] ?>">
            <trix-editor input="body"></trix-editor>
            <?= form_error('body', ' <p class="text-danger">', ' </p>') ?>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('.imgInput');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>