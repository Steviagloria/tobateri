<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>

<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3><?= $dataCount['tsKeluar']; ?></h3>
				<p>Transaksi Keluar</p>
			</div>
			<div class="icon">
				<i class="fas fa-arrow-circle-up"></i>
			</div>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?= $dataCount['tsMasuk']; ?></h3>
				<p>Transaksi Masuk</p>
			</div>
			<div class="icon">
				<i class="fas fa-arrow-circle-down"></i>
			</div>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3><?= $dataCount['supplier']; ?></h3>
				<p>Suplier</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-friends"></i>
			</div>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3><?= $dataCount['barang']; ?></h3>
				<p>Data Barang</p>
			</div>
			<div class="icon">
				<i class="fas fa-layer-group"></i>
			</div>
		</div>
	</div>
	<!-- ./col -->
</div>

<?= $this->endSection(); ?>