<div class="col-lg-8">
    <form action="<?= base_url('Dashboard/create_post') ?>" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Postingan</label>
            <input type="text" name="judul" class="form-control <?php if (form_error('judul')) echo "is-invalid"; ?>" id="judul" autofocus value="<?= set_value('judul') ?>">
            <?= form_error('judul', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Postingan</label>
            <select name="kategori" class="form-select">
                <option hidden>Pilih Kategori</option>
                <?php
                foreach ($category as $t) {
                ?>
                    <option value="<?= $t['id'] ?>"><?= $t['nama_kategori'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Postingan</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="file" class="form-control imgInput  <?php if (form_error('image')) echo "is-invalid"; ?>" id="image" name="image" onchange="previewImage()">
            <?= form_error('image', ' <div class="invalid-feedback">', '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi</label>
            <input type="hidden" id="body" name="body" value="<?= set_value('body') ?>">
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