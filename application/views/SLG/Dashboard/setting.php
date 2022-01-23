<div class="container">
    <div class="row my-3">
        <?= $this->session->flashdata('message'); ?>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Umum
                    </button>
                </h4>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="col-lg-6">
                            <form action="<?= base_url('Dashboard/e_setting') ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Desa</label>
                                    <input type="text" name="nama" class="form-control <?php if (form_error('nama')) echo "is-invalid"; ?>" id="nama" autofocus value="<?= $sid['nama_desa'] ?>">
                                    <?= form_error('nama', ' <div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Desa</label>
                                    <input type="text" name="alamat" class="form-control <?php if (form_error('alamat')) echo "is-invalid"; ?>" id="alamat" value="<?= $sid['alamat'] ?>">
                                    <?= form_error('alamat', ' <div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Logo Desa</label><br>
                                    <input type="file" class="form-control imgInput  <?php if (form_error('image')) echo "is-invalid"; ?>" id="image" name="image" onchange="previewImage()">
                                    <?= form_error('image', ' <div class="invalid-feedback">', '</div>') ?>
                                    <img class="img-preview img-fluid mt-3 col-sm-5" src="<?= base_url("assets/img/" . $sid['logo']) ?>">
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SEJARAH DESA -->
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Sejarah Desa
                    </button>
                </h4>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="<?= base_url('Dashboard/e_sejarah') ?>" method="POST">
                            <?= form_error('sejarah', ' <p class="text-danger">', ' </p>') ?>
                            <input type="hidden" id="sejarah" name="sejarah" value="<?= $sejarah['deskripsi'] ?>">
                            <trix-editor input="sejarah"></trix-editor>
                            <button class="btn btn-primary mt-3" type="submit" onclick="return confirm('Anda yakin ingin merubah sejarah?')">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- PROFIL DESA -->
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Profil Desa
                    </button>
                </h4>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="<?= base_url('Dashboard/e_profil') ?>" method="POST">
                            <?= form_error('profil', ' <p class="text-danger">', ' </p>') ?>
                            <input type="hidden" id="profil" name="profil" value="<?= $profil['deskripsi'] ?>">
                            <trix-editor input="profil"></trix-editor>
                            <button class="btn btn-primary mt-3" type="submit" onclick="return confirm('Apakah anda yakin ingin merubah informasi profil desa?')">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- VISIMISI DESA -->
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Visi Misi Desa
                    </button>
                </h4>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="<?= base_url('Dashboard/e_visimisi') ?>" method="POST">
                            <?= form_error('visimisi', ' <p class="text-danger">', ' </p>') ?>
                            <input type="hidden" id="visimisi" name="visimisi" value="<?= $visimisi['deskripsi'] ?>">
                            <trix-editor input="visimisi"></trix-editor>
                            <button class="btn btn-primary mt-3" type="submit" onclick="return confirm('Anda yakin ingin merubah visi misi desa?')">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- POTENSI DESA -->
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Potensi Desa
                    </button>
                </h4>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="<?= base_url('Dashboard/e_potensi') ?>" method="POST">
                            <?= form_error('potensi', ' <p class="text-danger">', ' </p>') ?>
                            <input type="hidden" id="potensi" name="potensi" value="<?= $potensi['deskripsi'] ?>">
                            <trix-editor input="potensi"></trix-editor>
                            <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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