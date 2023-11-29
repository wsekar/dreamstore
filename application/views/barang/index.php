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
            <?php if ($this->session->flashdata('barang_success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('barang_success') ?>
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                            <span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                <?php elseif ($this->session->flashdata('barang_error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('barang_error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header gy-3">
                                <?= $title; ?>
                            </h5>

                            <div class="card-body">
                                <?php if ($this->session->login['role'] == 'admin'): ?>
                                    <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary mb-3 mt-1">
                                        <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                                        </button>
                                    </a>
                                <?php endif ?>
                                <div class="table-responsive text-nowrap">
                                    <table id="example" class="table table-hover" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Kode Barang</th>
                                                <th>Gambar</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Deskripsi</th>
                                                <?php if ($this->session->login['role'] == 'admin'): ?>
                                                    <th>Aksi</th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($all_barang as $barang): ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $barang->nama_kategori ?>
                                                    </td>
                                                    <td>
                                                        <?= $barang->kode_barang ?>
                                                    </td>
                                                    <td>
                                                        <img src="<?= base_url() . 'assets/images/' . $barang->foto_barang ?>"
                                                            width="100" height="100" style="object-fit:cover;">
                                                    </td>
                                                    <td>
                                                        <?= $barang->nama_barang ?>
                                                    </td>
                                                    <td>
                                                    Rp<?= number_format($barang->harga_barang, 0, ',', '.') ?>
                                                    </td>
                                                    <td>
                                                        <?= $barang->stok ?> <?=$barang->nama_satuan?>
                                                    </td>
                                                    <td>
                                                        <?= $barang->deskripsi ?>
                                                    </td>
                                                    <?php if ($this->session->login['role'] == 'admin'): ?>
                                                        <td>
                                                            <a href="<?= base_url('barang/edit/' . $barang->id_barang) ?>"
                                                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                            <a onclick="return confirm('Apakah Anda yakin?')"
                                                                href="<?= base_url('barang/hapus/' . $barang->id_barang) ?>"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    <?php endif ?>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
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