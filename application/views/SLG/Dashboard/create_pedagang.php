<div class="col-lg-8">
    <form action="<?= base_url('Dashboard/p_create_umkm') ?>" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_penjualan" class="form-label">Nama Penjualan / Usaha / Toko / Kios</label>
            <input type="text" name="nama_penjualan" class="form-control" id="nama_penjualan" autofocus value="<?= set_value('nama_penjualan') ?>" required>
        </div>
        <div class="mb-3">
            <label for="pemilik" class="form-label">Nama Pemilik</label>
            <input type="text" name="pemilik" class="form-control" id="pemilik" value="<?= set_value('pemilik') ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat') ?>" required>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Nomor Telepon / WA</label>
            <input type="text" name="telp" class="form-control" id="telp" value="<?= set_value('telp') ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="file" class="form-control imgInput" id="image" name="image" onchange="previewImage()" required>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi</label>
            <input type="hidden" id="body" name="body" value="<?= set_value('body') ?>" required>
            <trix-editor input="body"></trix-editor>
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