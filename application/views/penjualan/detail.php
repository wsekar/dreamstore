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
            <div class="container-fluid">
                <!-- <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Datatable</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                        </ol>
                    </div>
                </div> -->
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header gy-3">
                            Detail Penjualan - <?= $penjualan->no_penjualan ?>
                            </h5>

                            <div class="card-body">
                            <div class="row">
								<div class="col-md-6">
									<table class="table table-borderless">
										<tr>
											<td>No Penjualan</td>
											<td>:</td>
											<td><?= $penjualan->no_penjualan ?></td>
										</tr>
										<tr>
											<td>Nama Kasir</td>
											<td>:</td>
											<td><?= $penjualan->nama_kasir ?></td>
										</tr>
										<tr>
											<td>Waktu Penjualan</td>
											<td>:</td>
											<td><?= formatHariTanggal($penjualan->tgl_penjualan) ?> - <?= $penjualan->jam_penjualan ?></td>
										</tr>
									</table>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead>
											<tr>
												<td>No</td>
												<td>Nama Barang</td>
												<td>Harga Barang</td>
												<td>Jumlah</td>
												<td>Sub Total</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_detail_penjualan as $detail_penjualan) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $detail_penjualan->nama_barang ?></td>
													<td>Rp <?= number_format($detail_penjualan->harga_barang, 0, ',', '.') ?></td>
													<td><?= $detail_penjualan->jumlah_barang ?> <?= strtoupper($detail_penjualan->satuan) ?></td>
													<td>Rp <?= number_format($detail_penjualan->sub_total, 0, ',', '.') ?></td>
												</tr>
											<?php endforeach ?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="4" align="right">Total : </td>
												<td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
                            <div class="form-group">
                                            <a href="<?= base_url() . 'penjualan' ?>" class="btn btn-dark"><i
                                                    class='fa fa-backward'></i>&nbsp;&nbsp;Kembali</a>
                                        </div>
                                <!-- <div class="table-responsive">
                                    <table id="example" class="table table-hover" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>No Penjualan</th>
                                                <th>Nama Kasir</th>
                                                <th>Tanggal Penjualan</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($all_penjualan as $penjualan): ?>
                                                <tr>
                                                    <td><?= $penjualan->no_penjualan ?></td>
                                                    <td>
                                                        <?= $penjualan->nama_kasir ?>
                                                    </td>
                                                    <td>
                                                    <?= formatHariTanggal($penjualan->tgl_penjualan) ?> <br /><?= $penjualan->jam_penjualan ?>
                                                    </td>
                                              
                                                    <td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
											
                                                    <?php if ($this->session->login['role'] == 'admin'): ?>
                                                        <td>
                                                        <a href="<?= base_url('penjualan/detail/' . $penjualan->no_penjualan) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                           
                                                            <a onclick="return confirm('apakah anda yakin?')"
                                                                href="<?= base_url('penjualan/hapus/' . $penjualan->no_penjualan) ?>"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    <?php endif ?>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
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