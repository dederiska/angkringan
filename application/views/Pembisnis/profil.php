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

                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('cover/' . $tampil['cover']) ?>" alt="" width='100%' class="mb-1">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    Nama Angkringan
                                </td>
                                <td>
                                    : <?= $tampil['nama_angkringan'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama Pemilik
                                </td>
                                <td>
                                    : <?= $tampil['nama_pemilik'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    : <?= $tampil['alamat'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone
                                </td>
                                <td>
                                    : <?= $tampil['phone'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jam Buka-Tutup
                                </td>
                                <td>
                                    : <?= $tampil['jam_buka_tutup'] ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>