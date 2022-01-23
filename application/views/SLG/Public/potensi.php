<div class="container mt-4">
    <div class="row">
        <div class="col-md-8" style="text-align:justify;">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="text-center">POTENSI DESA SALAGEDANG</h5>
                    <p class="text-center">
                        <img src="<?= base_url('assets/img/' . $sid['logo']) ?>" alt="" width="150px" class="img-fluid mb-2 mt-2">
                    </p>
                    <?= $potensi['deskripsi'] ?>

                </div>
            </div>
        </div>
        <?php $this->load->view('template/kanan'); ?>

    </div>
</div>

<?php $this->load->view('template/umkm3'); ?>