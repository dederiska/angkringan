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
                <form method="POST" action="<?= base_url('Pembisnis/edit_produk/' . $col['id_menu']) ?>">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10"><input value="<?= $col['nama_produk'] ?>" type="text" class="form-control" name="nama_produk"> </div>
                        <?= form_error('nama_produk', '<div class ="com-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10"><input value="<?= $col['harga'] ?>" type="text" class="form-control" name="harga">
                        </div>
                        <?= form_error('harga', '<div class ="com-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="i-checks"><label> <input type="radio" name="status" value="1"> <i></i> Ada </label></div>
                            <div class="i-checks"><label> <input type="radio" name="status" value="0" checked=""> <i></i> Tidak Ada </label></div>
                            <div class="hr-line-dashed"></div>
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