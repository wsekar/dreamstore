<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Fairy Store</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="<?= base_url('focus') ?>/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

                    <?php if ($this->session->flashdata('login_success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('login_success') ?>
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                                <span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    <?php elseif ($this->session->flashdata('login_error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('login_error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="<?= base_url('auth/proses_login') ?>">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Masukkan Username" autocomplete="off" required
                                                name="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Masukkan Password" required name="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="">Masuk Sebagai :</option>
                                                <option value="admin">Admin</option>
                                                <option value="kasir">Kasir</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="login">Sign
                                                in</button>
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
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('focus') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('focus') ?>/js/quixnav-init.js"></script>
    <script src="<?= base_url('focus') ?>/js/custom.min.js"></script>

</body>

</html>