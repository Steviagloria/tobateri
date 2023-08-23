<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<div class="d-flex">

    <div class="col-lg-7 m-auto">
        <div class="card card-light">

            <div class="card-header d-flex align-items-center">
                <a href="<?= base_url('barang'); ?>" class="btn btn-default mr-4">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="button" class="btn btn-info ml-auto" id="btn_submit">
                    <i class="fas fa-cloud-upload-alt"></i> Submit
                </button>
            </div>

            <form id="form_barang">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang">Nama</label>
                        <input type="text" data-label="Nama Barang" class="form-control" value="<?= (isset($dataBarang)) ? $dataBarang['nama_barang'] : ''; ?>" name="nama_barang" id="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah</label>
                        <input type="number" data-label="Jumlah Barang" class="form-control" value="<?= (isset($dataBarang)) ? $dataBarang['jumlah_barang'] : ''; ?>" name="jumlah_barang" id="jumlah_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_satuan_fg">Satuan</label>
                        <select class="form-control" data-label="Satuan Barang" id="nama_satuan_fg" name="nama_satuan_fg">
                            <option value="">--- PILIH SATUAN ---</option>
                            <?php foreach ($satuans as $s) : ?>
                                <option value="<?= $s['nama_satuan']; ?>" <?= (isset($dataBarang)) ? ($dataBarang['nama_satuan_fg'] == $s['nama_satuan']) ? 'selected' : '' : ''; ?>><?= $s['nama_satuan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga</label>
                        <input type="number" data-label="Harga Barang" class="form-control" value="<?= (isset($dataBarang)) ? $dataBarang['harga_barang'] : ''; ?>" name="harga_barang" id="harga_barang">
                    </div>
                </div>
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

            const formData = new FormData(document.getElementById('form_barang'));
            let endpoint = 'api/v1/barang/add';

            <?php if (isset($dataBarang)) : ?>
                formData.append("id_barang", "<?= $dataBarang['id_barang']; ?>");
                endpoint = 'api/v1/barang/edit';
            <?php endif; ?>

            for (const pair of formData.entries()) {
                // console.log(`${pair[0]}, ${pair[1]}`);
                // console.log(pair[0]);
                if (pair[1] === '') {
                    // console.log($('[name=' + pair[0]));
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
                        <?php if (!isset($dataBarang)) : ?>
                            $('#form_barang').trigger('reset');
                        <?php endif; ?>
                        Toast.fire({
                            icon: 'success',
                            title: 'Data barang berhasil ditambahkan ke database.'
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