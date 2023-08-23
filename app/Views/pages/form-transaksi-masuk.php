<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<div class="d-flex">

    <div class="col-lg-7 m-auto">
        <div class="card card-light">

            <div class="card-header d-flex align-items-center">
                <a href="<?= base_url('transaksi/masuk'); ?>" class="btn btn-default mr-4">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="button" id="btn_submit" class="btn btn-info ml-auto">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>

            <form id="form_transaksi_masuk">
                <div class="card-body">
                    <div class="form-group">
                        <label>Waktu</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="waktu_transaksi_masuk" id="waktidu_transaksi_masuk" data-target="#reservationdate" value="<?= (isset($dataTransaksiMasuk)) ? $dataTransaksiMasuk['waktu_transaksi_masuk'] : ''; ?>" placeholder="Pilih Waktu" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control select2" name="idx_barang" id="idx_barang">
                            <option class="option_default" value="">---</option>
                            <?php foreach ($barangs as $barang) : ?>
                                <option value="<?= $barang['id_barang']; ?>" <?= (isset($dataTransaksiMasuk)) ? ($dataTransaksiMasuk['id_barang'] == $barang['id_barang']) ? 'selected="selected"' : '' : ''; ?>"><?= $barang['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control select2" name="idx_supplier" id="idx_supplier">
                            <option class="option_default" value="">---</option>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option value="<?= $supplier['id_supplier']; ?>" <?= (isset($dataTransaksiMasuk)) ? ($dataTransaksiMasuk['id_supplier'] == $supplier['id_supplier']) ? 'selected="selected"' : '' : ''; ?>"><?= $supplier['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>
<!-- /.card -->

<script src="<?= base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            placeholder: "-- Pilih Data --"

        })

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    });
</script>

<script>
    $(function() {

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function validasiForm(formData) {

            let datas = [];

            for (const key of formData.keys()) {
                // console.log(key);
                // console.log(formData.get(key));
                datas.push(formData.get(key));
            }

            // console.log(datas.includes(''));

            if (datas.includes('')) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Data Transaksi tidak boleh ada yang kosong! Coba lagi.'
                });
                return false;
            }

            return true;

        }

        $('#btn_submit').click(function() {

            const formData = new FormData(document.getElementById('form_transaksi_masuk'));

            if (validasiForm(formData) == true) {

                let endpoint = 'api/v1/transaksi/masuk/add';

                <?php if (isset($dataTransaksiMasuk)) : ?>
                    formData.append("id_transaksi_masuk", "<?= $dataTransaksiMasuk['id_transaksi_masuk']; ?>");
                    endpoint = 'api/v1/transaksi/masuk/edit';
                <?php endif; ?>

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
                            <?php if (!isset($dataTransaksiMasuk)) : ?>
                                $("#form_transaksi_masuk").trigger('reset');
                                $(".select2").val('').trigger('change')
                            <?php endif; ?>
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            });
                        }
                    },
                    error: function() {
                        console.log("Gagal terhubung ke server.");
                    }
                });
            }

        });
    });
</script>

<?= $this->endSection(); ?>