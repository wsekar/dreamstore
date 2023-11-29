<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
                <a aria-expanded="false" class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fa fa-home"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-label">Data Master</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-dropbox"></i><span class="nav-text">Data Barang</span>
                </a>
                <ul aria-expanded="false">
                    <li class="nav-item <?= $aktif == 'kategori' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('kategori') ?>">Kategori</a>
                    </li>
                    <li class="nav-item <?= $aktif == 'satuan' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('satuan') ?>">Satuan</a>
                    </li>
                    <li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('barang') ?>">Barang</a>
                    </li>
                </ul>
            </li>
            <?php if ($this->session->login['role'] == 'admin'): ?>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-user"></i><span class="nav-text">Data Pengguna</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="nav-item <?= $aktif == 'admin' ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url('admin') ?>"">Admin</a></li>
                    <li class=" nav-item <?= $aktif == 'kasir' ? 'active' : '' ?>"><a class="nav-link"
                                    href="<?= base_url('kasir') ?>">Kasir</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li class="nav-label">Transaksi</li>
            <li class="nav-item <?= $aktif == 'penjualan' ? 'active' : '' ?>">
            <li><a aria-expanded="false" class="nav-link" href="<?= base_url('penjualan') ?>">
                    <i class="fa fa-shopping-cart"></i><span class="nav-text">Transaksi Penjualan</span>
                </a></li>

            <?php if ($this->session->login['role'] == 'admin'): ?>
                <li class="nav-label">Pengaturan</li>
                <li class="nav-item <?= $aktif == 'toko' ? 'active' : '' ?>">
                    <a aria-expanded="false" class="nav-link" href="<?= base_url('toko') ?>">
                        <i class="fa fa-building"></i>
                        <span class="nav-text">Profil Toko</span>
                    </a>
                </li>
                </li>
            <?php endif; ?>
    </div>


</div>