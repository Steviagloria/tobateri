<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<div class="d-flex">

    <div class="col-lg-7 m-auto">
        <div class="card card-light">

            <div class="card-header d-flex align-items-center">
                <a href="<?= base_url('supplier'); ?>" class="btn btn-default mr-4">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="button" id="btn_submit" class="btn btn-info ml-auto">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>

            <form id="form_supplier">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_supplier">Nama</label>
                        <input type="text" data-label="Nama Supplier" class="form-control" value="<?= (isset($dataSupplier)) ? $dataSupplier['nama_supplier'] : ''; ?>" name="nama_supplier" id="nama_supplier">
                    </div>
                    <div class="form-group">
                        <label for="alamat_supplier">Alamat</label>
                        <input type="text" data-label="Alamat Supplier" class="form-control" value="<?= (isset($dataSupplier)) ? $dataSupplier['alamat_supplier'] : ''; ?>" name="alamat_supplier" id="alamat_supplier">
                    </div>
                    <div class="form-group">
                        <label for="nohp_supplier">HP</label>
                        <input type="number" step="any" data-label="Nomor HP Supplier" class="form-control" value="<?= (isset($dataSupplier)) ? $dataSupplier['nohp_supplier'] : ''; ?>" name="nohp_supplier" id="nohp_supplier">
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

        $('#btn_submit').click(function() {

            console.log("btn_submit: clicked!");

            const formData = new FormData(document.getElementById('form_supplier'));
            let endpoint = 'api/v1/supplier/add';

            <?php if (isset($dataSupplier)) : ?>
                formData.append("id_supplier", "<?= $dataSupplier['id_supplier']; ?>");
                endpoint = 'api/v1/supplier/edit';
            <?php endif; ?>

            for (const pair of formData.entries()) {
                if (pair[1] === '') {
                    Toast.fire({
                        icon: 'error',
                        title: $('#' + pair[0]).data('label') + ' tidak boleh kosong! Silahkan masukan data.'
                    });
                    return false;
                }

            }

            $.ajax({
                url: "<?= base_url(); ?>/" + endpoint,
                data: formData,
                method: "POST",
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    if (res.status == '200') {
                        <?php if (!isset($dataSupplier)) : ?>
                            $('#form_supplier').trigger('reset');
                        <?php endif; ?>
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Supplier berhasil ditambahkan ke database.'
                        });
                    }
                },
                error: function() {
                    console.log("Gagal terhubung ke server.");
                }
            });

        });
    });
</script>

<?= $this->endSection(); ?>