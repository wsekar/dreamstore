<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')): ?>
<?php endif; ?>

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
                <?php if ($this->session->flashdata('kategori_success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('kategori_success') ?>
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                            <span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                <?php elseif ($this->session->flashdata('kategori_error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('kategori_error') ?>
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
                                    <a href="<?= base_url('kategori/tambah'); ?>" class="btn btn-primary mb-3 mt-1">
                                        <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                                        </button>
                                    </a>
                                <?php endif ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Kategori</th>
                                                <th>Nama Kategori</th>
                                                <?php if ($this->session->login['role'] == 'admin'): ?>
                                                    <th>Aksi</th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($all_kategori as $kategori): ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $kategori->kode_kategori ?>
                                                    </td>
                                                    <td>
                                                        <?= $kategori->nama_kategori ?>
                                                    </td>
                                                    <?php if ($this->session->login['role'] == 'admin'): ?>
                                                        <td>
                                                            <a href="<?= base_url('kategori/edit/' . $kategori->id_kategori) ?>"
                                                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                            <a onclick="return confirm('Apakah Anda yakin?')"
                                                                href="<?= base_url('kategori/hapus/' . $kategori->id_kategori) ?>"
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