<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>

                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form enctype="multipart/form-data" method="POST" action="<?= base_url('Admin/edit_angkringan/' . $col['id_angkringan']) ?>">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Angkringan</label>
                        <div class="col-sm-10"><input value="<?= $col['nama_angkringan'] ?>" type="text" class="form-control" name="nama_angkringan"> </div>
                        <?= form_error('nama_angkringan', '<div class ="com-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Pemilik</label>
                        <div class="col-sm-10"><input value="<?= $col['nama_pemilik'] ?>" type="text" class="form-control" name="nama_pemilik">
                        </div>
                        <?= form_error('nama_pemilik', '<div class ="com-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10"><input value="<?= $col['phone'] ?>" type="text" class="form-control" name="phone"></div>
                        <?= form_error('phone', '<div class ="com-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Jam Buka-Tutup</label>
                        <div class="col-sm-10"><input value="<?= $col['jam_buka_tutup'] ?>" type="text" class="form-control" name="jam"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10"><input value="<?= $col['alamat'] ?>" type="text" class="form-control" name="alamat"></div>
                    </div>
                    <?= form_error('alamat', '<div class ="com-12"><small class="text-danger">', '</small></div>') ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-md-6">
                            <img class="img-preview img-preview-sm" src="<?= base_url('cover/' . $col['cover']) ?>">
                            <div class="btn-group">
                                <label title="Masukan foto angkringan" for="image" class="btn btn-primary">
                                    <input type="file" accept="image/*" name="image" id="image" class="hide imgInput" onchange="previewImage()">
                                    Masukan Foto Angkringan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                            <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
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