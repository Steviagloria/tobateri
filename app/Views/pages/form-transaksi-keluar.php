<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<div class="d-flex">

    <div class="col-lg-7 m-auto">
        <div class="card card-light">

            <div class="card-header d-flex align-items-center">
                <a href="<?= base_url('transaksi/keluar'); ?>" class="btn btn-default mr-4">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="button" id="btn_submit" class="btn btn-info ml-auto">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>

            <form id="form_transaksi_keluar">
                <div class="card-body">
                    <div class="form-group">
                        <label>Waktu</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="waktu_transaksi_keluar" id="waktidu_transaksi_keluar" data-target="#reservationdate" value="<?= (isset($dataTransaksiKeluar)) ? $dataTransaksiKeluar['waktu_transaksi_keluar'] : ''; ?>" placeholder="Pilih Waktu" />
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
                                <option value="<?= $barang['id_barang']; ?>" <?= (isset($dataTransaksiKeluar)) ? ($dataTransaksiKeluar['id_barang'] == $barang['id_barang']) ? 'selected="selected"' : '' : ''; ?>"><?= $barang['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_penjual">Penjual</label>
                        <input type="text" class="form-control" name="nama_penjual" id="nama_penjual" value="<?= (isset($dataTransaksiKeluar)) ? $dataTransaksiKeluar['nama_penjual'] : ''; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="nama_penjual">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah_barang_keluar" id="jumlah_barang_keluar" value="<?= (isset($dataTransaksiKeluar)) ? $dataTransaksiKeluar['jumlah_barang_keluar'] : ''; ?>"/>
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

            const formData = new FormData(document.getElementById('form_transaksi_keluar'));

            if (validasiForm(formData) == true) {

                let endpoint = 'api/v1/transaksi/keluar/add';

                <?php if (isset($dataTransaksiKeluar)) : ?>
                    formData.append("id_transaksi_keluar", "<?= $dataTransaksiKeluar['id_transaksi_keluar']; ?>");
                    endpoint = 'api/v1/transaksi/keluar/edit';
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
                            <?php if (!isset($dataTransaksiKeluar)) : ?>
                                $("#form_transaksi_keluar").trigger('reset');
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