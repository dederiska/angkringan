<div class="container">
    <div class="row my-3">
        <div class="col-md-8">

            <div class="card mb-3">
                <div class="card-body">
                    <h4><?= $title ?></h4>
                </div>
            </div>

            <?php $this->load->view('template/artikel_terkini'); ?>
        </div>



        <?php $this->load->view('template/kanan'); ?>

    </div>
</div>