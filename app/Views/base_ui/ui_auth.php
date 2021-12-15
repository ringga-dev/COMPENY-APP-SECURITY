<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT Etowa </title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assest/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assest/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assest/logo/etw-color-Big.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <style>
        .btn.outline {
            background: none;
            padding: 0 10;
        }

        .btn-primary.outline {
            border: 2px solid #0099cc;
            color: #0099cc;
        }

        .btn-info.outline {
            border: 2px solid #0099cc;
            color: #0099cc;
        }

        .btn-primary.outline:hover,
        .btn-primary.outline:focus,
        .btn-primary.outline:active,
        .btn-primary.outline.active,
        .open>.dropdown-toggle.btn-primary {
            color: #33a6cc;
            border-color: #33a6cc;
        }

        .btn-primary.outline:active,
        .btn-primary.outline.active {
            border-color: #007299;
            color: #007299;
            box-shadow: none;
        }
    </style>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <!-- /.login-logo -->
        <?= $this->renderSection('auth'); ?>
        <!-- /.card -->
        <p class="card p-0 mt-3">
            <a href="<?= base_url('globalView/'); ?>">
                <h5 class="text-right" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-style: italic;">Hadiah PT Etowa</h5>
            </a>

            <a href="<?= base_url('globalView/absen_user'); ?>">
                <h5 class="text-right " style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-style: italic;">Absen Undian PT Etowa</h5>
            </a>

            <a href="<?= base_url('globalView/absen_etowa'); ?>">
                <h5 class="text-right" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-style: italic;">Absen User</h5>
            </a>
        </p>

    </div>
    <!-- /.login-box -->

    <!-- SweetAlert2 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>


    <!-- Bootstrap 4 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('tamplate/admin') ?>/dist/js/adminlte.min.js"></script>
    <script>
        <?php $pesan = session()->getFlashdata('pesan') ?>
        $(function() {
            <?php if ($pesan) { ?>
                <?php if ($pesan['stts'] != true) { ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        text: '<?= $pesan['msg'] ?>'
                    })
                <?php } else { ?>
                    Swal.fire({
                        icon: 'success',
                        title: 'Great!',
                        text: '<?= $pesan['msg'] ?>'
                    })
            <?php }
            } ?>

        });
    </script>
</body>

</html>