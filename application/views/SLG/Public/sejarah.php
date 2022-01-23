<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body" style="text-align:justify;">
                    <h4 class="text-center">SEJARAH DESA SALAGEDANG</h4>
                    <p class="text-center">
                        <img src="<?= base_url('assets/img/' . $sid['logo']) ?>" alt="" width="150px" class="img-fluid mb-2 mt-2">
                    </p>
                    <?= $info['deskripsi'] ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('template/kanan'); ?>
    </div>
</div>