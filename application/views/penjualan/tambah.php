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
            <div id="content" data-url="<?= base_url('penjualan') ?>">
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
                                        <form action="<?= base_url('penjualan/proses_tambah') ?>" id="form-tambah"
                                            method="POST">
                                            <h6>Data Kasir</h6>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-2">
                                                    <label>No Penjualan</label>
                                                    <input type="text" name="no_penjualan"
                                                        value="<?= $no_penjualan = $this->M_penjualan->buatkode() ?>"
                                                        readonly class="form-control">
                                                </div>
                                                <div class="form-group col-3">
                                                    <label>Kode Kasir</label>
                                                    <input type="text" name="kode_kasir"
                                                        value="<?= $this->session->login['kode'] ?>" readonly
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-3">
                                                    <label>Nama Kasir</label>
                                                    <input type="text" name="nama_kasir"
                                                        value="<?= $this->session->login['nama'] ?>" readonly
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Tanggal Penjualan</label>
                                                    <input type="text" name="tgl_penjualan" value="<?= date('m/d/Y') ?>"
                                                        readonly class="form-control">
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Jam</label>
                                                    <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>"
                                                        readonly class="form-control">
                                                </div>
                                            </div>
                                            <h6>Data Barang</h6>
                                            <hr>
                                            <div class="form-row">
                                                <input type="hidden" name="nama_barang" id="nama_barang" value=""
                                                    class="form-control" disabled>
                                                <div class="form-group col-4">
                                                    <label>Nama Barang</label>
                                                    <select name="id_barang" id="id_barang"
                                                        class="select2-with-label-single js-states d-block">
                                                        <option value="">Pilih Barang</option>
                                                        <?php foreach ($all_barang as $barang): ?>
                                                            <option value="<?= $barang->id_barang ?>">
                                                                <?= $barang->nama_barang ?> (
                                                                <?= $barang->kode_barang ?>)
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-3">
                                                    <label>Harga Barang</label>
                                                    <input type="number" name="harga_barang" id="harga_barang" value=""
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Jumlah</label>
                                                    <input type="number" name="jumlah_barang" id="jumlah_barang"
                                                        value="" class="form-control" min='1' readonly>
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Sub Total</label>
                                                    <input type="number" name="sub_total" id="sub_total" value=""
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="form-group col-1">
                                                    <label for="">&nbsp;</label>
                                                    <button disabled type="button" class="btn btn-primary btn-block"
                                                        id="tambah"><i class="fa fa-plus"></i></button>
                                                </div>
                                                <input type="hidden" name="satuan" id="satuan" value="">
                                            </div>
                                            <div class="keranjang">
                                                <h5>Detail Pembelian</h5>
                                                <hr>
                                                <table class="table table-bordered" id="keranjang-body">
                                                    <thead>
                                                        <tr>
                                                            <td width="35%">Nama Barang</td>
                                                            <td width="15%">Harga</td>
                                                            <td width="15%">Jumlah</td>
                                                            <td width="10%">Satuan</td>
                                                            <td width="10%">Sub Total</td>
                                                            <td width="15%">Aksi</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" align="right"><strong>Total : </strong></td>
                                                            <td id="total"></td>

                                                            <td>
                                                                <input type="hidden" name="harga_total" value="">
                                                                <input type="hidden" name="max_jumlah" id="max_jumlah"
                                                                    value="">
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('tfoot').hide();

            $('#id_barang').on('change',
                function () {
                    let id_alat = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('barang/get_barang'); ?>",
                        data: {
                            id_barang: $(this).val()
                        },
                        dataType: "json",
                        success: function (data) {
                            $('#nama_barang').val(data.nama_barang);
                            $('#harga_barang').val(data.harga_barang)
                            $('#jumlah_barang').val(1)
                            $('#satuan').val(data.satuan)
                            $('#max_jumlah').val(data.stok)
                            $('#jumlah_barang').prop('readonly', false)
                            $('button#tambah').prop('disabled', false)

                            $('#sub_total').val($('#jumlah_barang').val() * $('#harga_barang').val())

                            $('#jumlah_barang').on('keydown keyup change blur', function () {
                                $('#sub_total').val($('#jumlah_barang').val() * $('#harga_barang').val())
                            })
                        }
                    })
                });

            $('#jumlah_barang').on('input', function () {
                let jumlah = parseInt($(this).val());
                let harga = parseFloat($('#harga_barang').val());

                if (!isNaN(jumlah) && !isNaN(harga)) {
                    $('#sub_total').val(jumlah * harga);
                } else {
                    $('#sub_total').val('');
                }
            });

            $(document).on('click', '#tambah', function (e) {
                const nama_barang = $('#nama_barang').val();
                const id_barang = $('#id_barang').val();
                const harga_barang = parseFloat($('#harga_barang').val());
                const jumlah_barang = parseInt($('#jumlah_barang').val());
                const satuan = $('#satuan').val();

                if (jumlah_barang <= 0 || isNaN(harga_barang)) {
                    alert('Masukkan jumlah minimal 1.');
                    return;
                }

                if (jumlah_barang > parseInt($('#max_jumlah').val())) {
                    alert('stok tidak tersedia! stok tersedia : ' + $('#max_jumlah').val());
                    return;
                } else {

                    const sub_total = jumlah_barang * harga_barang;

                    const newRow = `<tr class="row-keranjang">
                    <td class="id_barang" hidden><input type="hidden" name="id_barang[]" value="${id_barang}"></td>
                    <td class="nama_barang">${nama_barang}<input type="hidden" value="${nama_barang}"></td>
                    <td class="harga_barang">${harga_barang}<input type="hidden" name="harga_barang[]" value="${harga_barang}"></td>
                    <td class="jumlah">${jumlah_barang}<input type="hidden" name="jumlah_barang[]" value="${jumlah_barang}"></td>
                    <td class="satuan">${satuan}<input type="hidden" name="satuan[]" value="${satuan}"></td>
                    <td class="sub_total">${sub_total}<input type="hidden" name="sub_total[]" value="${sub_total}"></td>
                    <td class="aksi">
                        <button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="${nama_barang}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>`;

                    $('#keranjang-body').append(newRow);

                    reset();
                    $('tfoot').show();

                    $('#total').html('<strong>' + hitung_total() + '</strong>');
                    $('input[name="harga_total"]').val(hitung_total());
                }

            });

            $(document).on('click', '#tombol-hapus', function () {
                const id_barang = $(this).data('nama-barang');
                $(this).closest('.row-keranjang').remove();
                
                $('#id_barang option[value="' + id_barang + '"]').show();

                $('#total').html('<strong>' + hitung_total() + '</strong>');
            });

            $('button[type="submit"]').on('click', function () {
                $('#kode_barang').prop('disabled', true);
                $('#id_barang').prop('disabled', true);
                $('#harga_barang').prop('disabled', true);
                $('#jumlah_barang').prop('disabled', true);
                $('#sub_total').prop('disabled', true);
            });

            function hitung_total() {
                let total = 0;
                $('.sub_total').each(function () {
                    total += parseFloat($(this).text());
                })

                return total.toFixed(2);
            }

            function reset() {
                $('#nama_barang').val('').trigger('change');
                $('#kode_barang').val('').trigger('change');
                $('#harga_barang').val('').trigger('change');
                $('#jumlah_barang').val('').trigger('change');
                $('#sub_total').val('').trigger('change');
                $('#jumlah_barang').prop('readonly', true);
                $('button#tambah').prop('disabled', true)
            }
        });
    </script>
</body>

</html>