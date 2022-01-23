<div class="container">
    <div class="row my-3">
        <?= $this->session->flashdata('message'); ?>
        <div class="card col-md-8">
            <div class="card-body">

                <a href="<?= base_url('Dashboard/pedagang') ?>" class="btn btn-sm btn-success">
                    <span data-feather="arrow-left"></span> Kembali</a>
                <a href="#" class="btn btn-sm btn-primary tambahFoto" onclick="tampilInput()">
                    <span data-feather="x-circle"></span>
                    Tambahkan Foto</a>
                <a href="<?= base_url('Dashboard/edit_pedagang/' . $pedagang['id']) ?>" class="btn btn-sm btn-warning">
                    <span data-feather="edit"></span>
                    Edit</a>
                <a href="<?= base_url('Dashboard/del_pedagang/' . $pedagang['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <span data-feather="x-circle"></span>
                    Hapus</a>


                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?= base_url('image2/' . $pedagang['image']) ?>" alt="<?= $pedagang['nama_penjualan'] ?>" class="img-fluid mt-3">
                </div>


                <table class="table mt-4">
                    <tr>
                        <td>Nama Pemilik</td>
                        <td>: <?= $pedagang['pemilik'] ?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>: <?= $pedagang['telp'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $pedagang['alamat'] ?></td>
                    </tr>
                </table>
                <article class="my-3 fs-6" style="text-align:justify;">
                    <?= $pedagang['deskripsi'] ?>
                </article>
                <div class="text-muted text-right border-top">
                    Dibuat pada : <?= $pedagang['created_at'] ?></br>
                    Diubah pada : <?= $pedagang['updated_at'] ?>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <form action="<?= base_url('Dashboard/add_galeri2') ?>" method="POST" class="inputFoto d-none" enctype="multipart/form-data">
                    <div class="input-group text-ask">
                        <h6>Tambahkan Foto Dokumentasi ?</h6>
                    </div>
                    <img class="img-preview img-fluid mb-3">
                    <div class="input-group">
                        <input type="text" name="caption" class="form-control" placeholder="Caption">
                    </div>
                    <div class="input-group">
                        <input type="text" name="id_pedagang" value="<?= $pedagang['id'] ?>" hidden>
                        <input type="file" class="form-control imgInput" name="image" onchange="previewImage()">
                        <button class="btn btn-primary" type="submit" id="button-addon2">
                            Tambahkan
                        </button>
                    </div>
                    <hr>
                </form>
                <script>
                    function tampilInput() {
                        const formInput = document.querySelector('.inputFoto');
                        formInput.classList.remove('d-none');
                    }

                    function previewImage() {
                        const txtask = document.querySelector('.text-ask');
                        const image = document.querySelector('.imgInput');
                        const imgPreview = document.querySelector('.img-preview');

                        imgPreview.style.display = 'block';
                        txtask.style.display = 'none';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(oFREvent) {
                            imgPreview.src = oFREvent.target.result;
                        }
                    }
                </script>

                <?php
                foreach ($galeri as $f) {
                ?>
                    <img src="<?= base_url('galeri2/' . $f['foto']) ?>" alt="" class="img-thumbnail">
                    <p class="text-center"><b><?= $f['caption'] ?></b></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>