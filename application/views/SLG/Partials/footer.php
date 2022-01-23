</main>
</div>
</div>

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>assets/js/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/dashboard.js"></script>

<script src="<?= base_url('table/') ?>datatables.min.js"></script>
<script>
    function init_DataTables() {
        $('#datatable-responsive').DataTable();
    };
    $(document).ready(function() {
        init_DataTables();
    });
</script>
</body>

</html>