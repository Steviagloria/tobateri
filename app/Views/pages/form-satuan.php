<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<div class="d-flex">

    <div class="col-lg-4 m-auto">
        <div class="card card-light">
            <div class="card-header d-flex align-items-center">
                <a href="<?= base_url('satuan'); ?>" class="btn btn-default mr-4">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="button" class="btn btn-info ml-auto" id="btn_simpan">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>

            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_satuan"><?= (isset($satuan)) ? 'Ganti' : ''; ?> Nama Satuan</label>
                        <?php if (isset($satuan)) : ?>
                            <input type="text" class="form-control mb-2" value="<?= $satuan['nama_satuan'] ?>" disabled>
                        <?php endif; ?>
                        <input type="text" class="form-control" value="<?= (isset($satuan)) ? $satuan['nama_satuan'] : ''; ?>" name="nama_satuan" id="nama_satuan">
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>
<!-- /.card -->

<script>
    $(function() {

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('#btn_simpan').click(function() {

            if ($('#nama_satuan').val() == '') {
                Toast.fire({
                    icon: 'warning',
                    title: 'Nama Satuan tidak boleh kosong. Coba lagi.'
                });
            } else {
                submitNewSatuan();
            }


        });

        <?php if (!isset($satuan)) : ?>

            function submitNewSatuan() {
                $.ajax({
                    url: "<?= base_url('api/v1/satuan/add'); ?>",
                    method: "POST",
                    data: {
                        nama_satuan: $('#nama_satuan').val()
                    },
                    success: function(res) {
                        if (res.status == '200') {
                            $('#nama_satuan').val('');
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            });
                        }
                    }
                });
            }
        <?php endif; ?>

        <?php if (isset($satuan)) : ?>

            function submitNewSatuan() {
                $.ajax({
                    url: "<?= base_url('api/v1/satuan/edit'); ?>",
                    method: "POST",
                    data: {
                        id_satuan: <?= $satuan['id_satuan']; ?>,
                        nama_satuan: $('#nama_satuan').val()
                    },
                    success: function(res) {
                        if (res.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            });
                        }
                    }
                });
            }
        <?php endif; ?>


    });
</script>

<?= $this->endSection(); ?>