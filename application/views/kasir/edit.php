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
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <h5 class="card-header gy-3">
                                <?= $title; ?>
                            </h5>

                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?= base_url('kasir/proses_edit/' . $kasir->id_kasir) ?>" " id="form-tambah"
                                        method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kode Kasir</label>
                                                <input type="text" name="kode_kasir" placeholder="Masukkan Kode Kasir"
                                                    autocomplete="off" class="form-control" required
                                                    value="<?= $kasir->kode_kasir ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Kasir</label>
                                                <input type="text" name="nama_kasir" placeholder="Masukkan Nama Kasir"
                                                    autocomplete="off" class="form-control" required value="<?= $kasir->nama_kasir ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email_kasir" placeholder="Masukkan Email"
                                                    autocomplete="off" class="form-control" required value="<?= $kasir->email_kasir ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jenis Kelamin</label><br>
                                                <input type="radio" name="jenis_kelamin_kasir" id="laki-laki"
                                                    value="Laki-Laki" required <?php echo $kasir->jenis_kelamin_kasir ?> <?= $kasir->id_kasir == 0 ? "" : ($kasir->jenis_kelamin_kasir == "Laki-Laki" ? "checked" :  "") ?> /> Laki-Laki
                                                <input type="radio" name="jenis_kelamin_kasir" id="perempuan"
                                                    value="Perempuan" required <?php echo $kasir->jenis_kelamin_kasir ?> <?= $kasir->id_kasir == 0 ? "" : ($kasir->jenis_kelamin_kasir == "Perempuan" ? "checked" :  "") ?>/> Perempuan
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" name="username_kasir" placeholder="Masukkan Username"
                                                    autocomplete="off" class="form-control" required value="<?= $kasir->username_kasir ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" name="password_kasir"
                                                    placeholder="Masukkan Password" autocomplete="off"
                                                    class="form-control" required value="<?= $kasir->password_kasir ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            <button type="reset" class="btn btn-danger"><i
                                                    class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                            <a href="<?= base_url() . 'kasir' ?>" class="btn btn-dark"><i
                                                    class='fa fa-backward'></i>&nbsp;&nbsp;Kembali</a>
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

</body>

</html>