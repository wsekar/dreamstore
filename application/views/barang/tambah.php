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
                                    <form action="<?= base_url('barang/proses_tambah') ?>" id="form-tambah"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kode Barang</label>
                                                <input type="text" name="kode_barang" placeholder="Masukkan Kode barang"
                                                    autocomplete="off" class="form-control" required
                                                    value="<?= $kode_barang = $this->M_barang->buatkode() ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kategori Barang</label>
                                                <select type="text" name="id_kategori"
                                                    class="select2-with-label-single js-states d-block">
                                                    <option value="">Pilih Kategori</option>
                                                    <?php foreach ($all_kategori as $kategori): ?>
                                                        <option value="<?= $kategori->id_kategori ?>">
                                                            <?= $kategori->nama_kategori ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama Barang</label>
                                                <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang"
                                                    autocomplete="off" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Harga</label>
                                                <input type="number" name="harga_barang"
                                                    placeholder="Masukkan Harga Barang" autocomplete="off"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Stok</label>
                                                <input type="number" name="stok"
                                                    placeholder="Masukkan Jumlah Stok Barang" autocomplete="off"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Satuan</label>
                                                <select type="text" name="id_satuan"
                                                    class="select2-with-label-single js-states d-block">
                                                    <option value="">Pilih Satuan</option>
                                                    <?php foreach ($all_satuan as $satuan): ?>
                                                        <option value="<?= $satuan->id_satuan ?>">
                                                            <?= $satuan->nama_satuan ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Gambar</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="foto_barang"
                                                            name="foto_barang" required>
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control " id="deskripsi" name="deskripsi"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            <button type="reset" class="btn btn-danger"><i
                                                    class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                            <a href="<?= base_url() . 'barang' ?>" class="btn btn-dark"><i
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
    <script>
        CKEDITOR.replace('deskripsi')
    </script>
    <script>
        $('.custom-file-input').on('change', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
</body>

</html>