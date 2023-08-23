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
    <div class="col-lg-12 m-auto">
        <div class="card card-light">
            <div class="card-header d-flex align-items-center mb-2">
                <h3 class="card-title">Transaksi Masuk</h3>
                <a href="<?= base_url('transaksi/masuk/add'); ?>" class="btn btn-light ml-auto"><i class="fas fa-plus"></i></a>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tgl. Masuk</td>
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                            <td>Satuan</td>
                            <td>Pengirim</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 32 32" id="option">
                                    <g data-name="Layer 2">
                                        <circle cx="5.11" cy="16" r="3.11"></circle>
                                        <circle cx="16" cy="16" r="3.11"></circle>
                                        <circle cx="26.89" cy="16" r="3.11"></circle>
                                    </g>
                                </svg></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataTransaksiMasuk as $i => $data) : ?>
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $data['waktu_transaksi_masuk']; ?></td>
                                <td><?= $data['nama_barang']; ?></td>
                                <td><?= $data['jumlah_barang']; ?></td>
                                <td><?= $data['nama_satuan_fg']; ?></td>
                                <td><?= $data['nama_supplier']; ?></td>
                                <td>
                                    <a href="<?= base_url('transaksi/masuk/ubah/' . $data['id_transaksi_masuk']); ?>" class="text-decoration-none mr-3 text-success" title="Edit">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="#" class="text-decoration-none text-danger" onclick="deleteTransaksiMasuk(this, <?= $data['id_transaksi_masuk']; ?>, '<?= $i; ?>')" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    var ids; // id satuan secara global
    var eltd; // element td yang dipilih

    // menampilkan modal
    function deleteTransaksiMasuk(e, id, nama) {

        eltd = e.parentElement.parentElement;

        ids = id;

        $('#txt_modal').html('Ingin hapus transaksi no. <b>' + nama + '</b> ?');

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
                url: "<?= base_url('api/v1/transaksi/masuk/delete'); ?>",
                data: {
                    id_transaksi_masuk: ids
                },
                method: "POST",
                success: function(res) {

                    if (res.status == '200') {
                        eltd.remove();
                        $('#btn_close').click();
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
        });
    });
</script>


<?= $this->endSection(); ?>