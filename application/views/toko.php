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
                <!-- row -->

                <?php if ($this->session->flashdata('toko_success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('toko_success') ?>
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                            <span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                <?php elseif ($this->session->flashdata('toko_error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('toko_error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <h5 class="card-header gy-3">
                                <?= $title; ?>
                            </h5>

                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?= base_url('toko/proses_edit') ?>" id="form-tambah" method="POST">
                                        <div class="form-group">
                                            <label>Nama Toko</label>
                                            <input type="text" name="nama_toko" id="nama_toko"
                                                value="<?= $toko->nama_toko ?>" placeholder="Masukan Nama Toko"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <input type="text" name="nama_pemilik" id="nama_pemilik"
                                                value="<?= $toko->nama_pemilik ?>" placeholder="Masukan Nama Pemilik"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input type="number" name="tlp_toko" id="tlp_toko"
                                                value="<?= $toko->tlp_toko ?>" placeholder="Masukan Nomor Telepon"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <labe>Alamat</label>
                                                <textarea readonly name="alamat_toko" id="alamat_toko"
                                                    class="form-control" placeholder="Masukan Alamat"
                                                    style="resize: none;"><?= $toko->alamat_toko ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                Simpan</button>
                                            <button type="button" class="btn btn-success" id="edit"><i
                                                    class="fa fa-pencil"></i> Edit</button>
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>
                                                Batal</button>
                                        </div>
                                    </form>
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
    <script>
        $(document).ready(function () {
            $('#edit').on('click', function () {
                $('#nama_toko').prop('readonly', false)
                $('#nama_pemilik').prop('readonly', false)
                $('#tlp_toko').prop('readonly', false)
                $('#alamat_toko').prop('readonly', false)
            })

            $('button[type="reset"]').on('click', function () {
                $('#nama_toko').prop('readonly', true)
                $('#nama_pemilik').prop('readonly', true)
                $('#tlp_toko').prop('readonly', true)
                $('#alamat_toko').prop('readonly', true)
            })
        })
    </script>

</body>

</html>