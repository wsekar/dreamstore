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
                                    <form action="<?= base_url('admin/proses_edit/' . $admin->id_admin) ?>" " id="form-tambah"
                                        method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kode Admin</label>
                                                <input type="text" name="kode_admin" placeholder="Masukkan Kode Admin"
                                                    autocomplete="off" class="form-control" required
                                                    value="<?= $admin->kode_admin ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Admin</label>
                                                <input type="text" name="nama_admin" placeholder="Masukkan Nama Admin"
                                                    autocomplete="off" class="form-control" required value="<?= $admin->nama_admin ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email_admin" placeholder="Masukkan Email"
                                                    autocomplete="off" class="form-control" required value="<?= $admin->email_admin ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jenis Kelamin</label><br>
                                                <input type="radio" name="jenis_kelamin_admin" id="laki-laki"
                                                    value="Laki-Laki" required <?php echo $admin->jenis_kelamin_admin ?> <?= $admin->id_admin == 0 ? "" : ($admin->jenis_kelamin_admin == "Laki-Laki" ? "checked" :  "") ?> /> Laki-Laki
                                                <input type="radio" name="jenis_kelamin_admin" id="perempuan"
                                                    value="Perempuan" required <?php echo $admin->jenis_kelamin_admin ?> <?= $admin->id_admin == 0 ? "" : ($admin->jenis_kelamin_admin == "Perempuan" ? "checked" :  "") ?>/> Perempuan
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" name="username_admin" placeholder="Masukkan Username"
                                                    autocomplete="off" class="form-control" required value="<?= $admin->username_admin ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" name="password_admin"
                                                    placeholder="Masukkan Password" autocomplete="off"
                                                    class="form-control" required value="<?= $admin->password_admin ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            <button type="reset" class="btn btn-danger"><i
                                                    class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                            <a href="<?= base_url() . 'admin' ?>" class="btn btn-dark"><i
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