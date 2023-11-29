<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php $this->load->view('partials/header.php') ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php $this->load->view('partials/sidebar.php') ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi,
                                <?= $this->session->login['nama'] ?>!
                            </h4>
                            <p class="mb-0">Selamat datang di halaman dashboard Dream Store</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-dropbox text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text"><a href="<?= base_url() . 'barang' ?>">Barang</a></div>
                                    <div class="stat-digit">
                                        <?= $jumlah_barang ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($this->session->login['role'] == 'admin'): ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="stat-widget-one card-body">
                                    <div class="stat-icon d-inline-block">
                                        <i class="fa fa-users text-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content d-inline-block">
                                        <div class="stat-text"><a href="<?= base_url() . 'admin' ?>">Admin</a></div>
                                        <div class="stat-digit">
                                            <?= $jumlah_admin ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="stat-widget-one card-body">
                                    <div class="stat-icon d-inline-block">
                                        <i class="fa fa-users text-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content d-inline-block">
                                        <div class="stat-text"><a href="<?= base_url() . 'kasir' ?>">Kasir</a></div>
                                        <div class="stat-digit">
                                            <?= $jumlah_kasir ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-shopping-cart text-danger border-danger"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text"><a href="<?= base_url() . 'penjualan' ?>">Penjualan</a></div>
                                    <div class="stat-digit">
                                        <?= $jumlah_penjualan ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <h5 class="card-header gy-3">Profil Toko</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" value="<?= $toko->nama_toko ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pemilik</label>
                                    <input type="text" value="<?= $toko->nama_pemilik ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" value="<?= $toko->tlp_toko ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <labe>Alamat</label>
                                        <input type="text" value="<?= $toko->alamat_toko ?>" readonly
                                            class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <h5 class="card-header gy-3">User Login</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" value="<?= $this->session->login['nama'] ?>" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" value="<?= $this->session->login['username'] ?>"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" value="<?= $this->session->login['role'] ?>" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <labe>Jam Login</label>
                                        <input type="text" value="<?= $this->session->login['jam_masuk'] ?>" readonly
                                            class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
 
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                            <script type="text/javascript">
                                var ctx = document.getElementById('myChart').getContext('2d');
                                myChart.height = 120;
                                var chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        defaultFontFamily: 'Poppins',
                                        labels: [
                                            <?php
                                            if (count($graph) > 0) {
                                                foreach ($graph as $data) {
                                                    echo "'" . $data->nama_barang . "',";
                                                }
                                            }
                                            ?>
                                        ],
                                        datasets: [{
                                            label: 'Stok Barang',
                                            backgroundColor: '#593bdb',
                                            borderColor: '#4425cb',
                                            borderWidth: "0",
                                            data: [
                                                <?php
                                                if (count($graph) > 0) {
                                                    foreach ($graph as $data) {
                                                        echo $data->stok . ", ";
                                                    }
                                                }
                                                ?>
                                            ]
                                        }]
                                    },
                                    options: {
                                        legend: false,
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }],
                                            xAxes: [{
                                                barPercentage: 0.5
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view('partials/footer.php') ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php $this->load->view('partials/js.php') ?>

</body>

</html>