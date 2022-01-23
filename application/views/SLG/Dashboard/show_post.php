<div class="container">
    <div class="row my-3">
        <?= $this->session->flashdata('message'); ?>
        <div class="card col-md-8">
            <div class="card-body">

                <a href="<?= base_url('Dashboard/posts') ?>" class="btn btn-sm btn-success">
                    <span data-feather="arrow-left"></span> Kembali</a>
                <a href="#" class="btn btn-sm btn-primary tambahFoto" onclick="tampilInput()">
                    <span data-feather="x-circle"></span>
                    Tambahkan Foto</a>
                <a href="<?= base_url('Dashboard/edit_post/' . $post['id']) ?>" class="btn btn-sm btn-warning">
                    <span data-feather="edit"></span>
                    Edit</a>
                <a href="<?= base_url('Dashboard/del_post/' . $post['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <span data-feather="x-circle"></span>
                    Hapus</a>


                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?= base_url('image/' . $post['image']) ?>" alt="<?= $post['nama_kategori'] ?>" class="img-fluid mt-3">
                </div>

                <article class="my-3 fs-6" style="text-align:justify;">
                    <?= $post['body'] ?>
                </article>
                <div class="text-muted text-right border-top">
                    Dibuat pada : <?= $post['created_at'] ?></br>
                    Diubah pada : <?= $post['updated_at'] ?>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <form action="<?= base_url('Dashboard/add_galeri') ?>" method="POST" class="inputFoto d-none" enctype="multipart/form-data">
                    <div class="input-group text-ask">
                        <h6>Tambahkan Foto Dokumentasi ?</h6>
                    </div>
                    <img class="img-preview img-fluid mb-3">
                    <div class="input-group">
                        <input type="text" name="id_post" value="<?= $post['id'] ?>" hidden>
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
                $galeri = $this->db->get_where('galeri', ['id_post' => $post['id']])->result_array();
                foreach ($galeri as $f) {
                ?>
                    <img src="<?= base_url('galeri/' . $f['foto']) ?>" alt="" class="img-thumbnail">
                <?php
                }
                ?>
            </div>
        </div>
    </div>