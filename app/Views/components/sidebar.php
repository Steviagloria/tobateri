<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- Button Dashboard -->
            <li class="nav-item">
                <a href="<?= base_url(); ?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <!-- Dropdown Data -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-server"></i>
                    <p>
                        Data Utama
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('barang'); ?>" class="nav-link not-full-hover">
                            <i class="fa fa-box-tissue nav-icon"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('satuan'); ?>" class=" nav-link not-full-hover">
                            <i class="far fa-clipboard nav-icon"></i>
                            <p>Satuan Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('supplier'); ?>" class=" nav-link not-full-hover">
                            <i class="far fa-address-card nav-icon"></i>
                            <p>Data Supplier</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Transaksi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('transaksi/masuk'); ?>" class="nav-link not-full-hover">
                            <i class="fa fa-arrow-right nav-icon"></i>
                            <p>Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('transaksi/keluar'); ?>" class="nav-link not-full-hover">
                            <i class="fa fa-arrow-left nav-icon"></i>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>Pengaturan</p>
                </a>
            </li> -->

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->