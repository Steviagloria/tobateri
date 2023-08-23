<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<div class="modal fade" id="modal_hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="txt_modal"></p>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="button" id="btn_yes" class="btn btn-primary">Ya</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<button type="button" class="btn btn-default d-none" id="btn_modal" data-toggle="modal" data-target="#modal_hapus">
    Launch Default Modal
</button>

<div class="d-flex">
    <div class="col-lg-6 m-auto">
        <div class="card card-light">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title">Daftar Satuan</h3>
                <a href="<?= base_url('satuan/tambah'); ?>" class="btn btn-light ml-auto">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Satuan Barang</th>
                            <th><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 32 32" id="option">
                                    <g data-name="Layer 2">
                                        <circle cx="5.11" cy="16" r="3.11"></circle>
                                        <circle cx="16" cy="16" r="3.11"></circle>
                                        <circle cx="26.89" cy="16" r="3.11"></circle>
                                    </g>
                                </svg></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $i => $s) : ?>
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $s['nama_satuan']; ?></td>
                                <td>
                                    <a href="<?= base_url('satuan/ubah/' . $s['id_satuan']); ?>" class="text-decoration-none mr-3 text-success" title="Edit">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="#" class="text-decoration-none text-danger" onclick="deleteSatuan(this, <?= $s['id_satuan']; ?>, '<?= $s['nama_satuan']; ?>')" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var ids; // id satuan secara global
    var eltd; // element td yang dipilih

    // menampilkan modal
    function deleteSatuan(e, id, nama) {

        eltd = e.parentElement.parentElement;

        ids = id;

        $('#txt_modal').html('Ingin hapus satuan"' + nama + '"?');

        document.getElementById('btn_modal').click();

    }

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $(function() {
        $('#btn_yes').click(function() {

            $.ajax({
                url: "<?= base_url('api/v1/satuan/delete'); ?>",
                data: {
                    id_satuan: ids
                },
                method: "POST",
                success: function(res) {

                    // console.log(res);

                    if (res.status == '200') {
                        eltd.remove();
                        $('#btn_close').click();
                        Toast.fire({
                            icon: 'success',
                            title: 'Data satuan berhasil dihapus dari database.'
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