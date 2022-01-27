<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT Etowa <?= $title ?></title>
    <?php $sesion = session()->get() ?>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assest/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assest/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assest/logo/etw-color-Big.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/css/fixedColumns.dataTables.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/summernote/summernote-bs4.min.css">

    <style>
        th,
        td {
            white-space: nowrap;
        }

        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }
    </style>
    <!-- jQuery -->
    <script src="<?= base_url('assest/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assest/js/typeahead.bundle.js') ?>"></script>
    <script src="<?= base_url('assest/js/bootstrap-autocomplete.js') ?>"></script>
    <script src="<?= base_url('assest/js') ?>/bootstrap3-typeahead.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('tamplate/admin') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Select2 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--        https://cdnjs.com/libraries/moment.js/-->
    <script src="<?= base_url("assest/js/moment.min.js") ?>"></script>

    <!--        https://cdnjs.com/libraries/bootstrap-datetimepicker-->
    <link type="text/css" rel="stylesheet" href="<?= base_url("assest/css/bootstrap-datetimepicker.min.css") ?>" />
    <script type="text/javascript" src=<?= base_url("assest/js/bootstrap-datetimepicker.min.js") ?>></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/summernote/summernote-bs4.min.js"></script>


    <!-- CodeMirror -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/codemirror/codemirror.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/codemirror/mode/css/css.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="<?= base_url('tamplate/admin') ?>/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>



    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="<?= base_url('tamplate/admin') ?>/plugins/datatables-buttons/js/dataTables.fixedColumns.min.js"></script>

    <!-- C:\xampp\htdocs\mobile\public\assest\js\daterangepicker.css -->
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->


</head>

<body class="hold-transition  sidebar-mini  sidebar-collapse">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url() ?>/assest/logo/etw-color-Big.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout') ?>" id="logout" role="button">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link" style="background: white;">
                <img src="<?= base_url() ?>/assest/logo/etw-color-Big.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: 10; background: white; border: black;">
                <span class="brand-text font-weight-light" style="color: black; font-style: oblique;">PT. Etowa</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image ">
                        <img src="<?= base_url() ?>/assest/logo/user.png" class="img-circle elevation-2 " alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $sesion['data']['fullname'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?= $this->renderSection('menu'); ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">PT. Etowa Packaging Indonesia</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">View On</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <?= $this->renderSection('content'); ?>
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer
        <footer class="main-footer">
            <strong>Copyright On <a href="https://github.com/ringga-dev/"> admin of apps</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Time</b> <label id="jam"> </label>
            </div>
        </footer> -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <!-- overlayScrollbars -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('tamplate/admin') ?>/dist/js/adminlte.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('tamplate/admin') ?>/dist/js/demo.js"></script>


    <!-- SweetAlert2 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        <?php $pesan = session()->getFlashdata('pesan') ?>
        $(function() {

            $(".timepicker").datetimepicker({
                format: "HH:mm"
            });

            <?php if ($pesan) { ?>
                <?php if ($pesan['stts'] != true) { ?>

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Terjadi Kesalahan Proses!',
                        text: '<?= $pesan['msg'] ?>',
                        showConfirmButton: false,
                        timer: 2500
                    })
                <?php } else { ?>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Proses OK!',
                        text: '<?= $pesan['msg'] ?>',
                        showConfirmButton: false,
                        timer: 2500
                    })
            <?php }
            } ?>
        });
    </script>

    <script>
        $(function() {

            $("#datetimeEndPicker").datetimepicker({
                useCurrent: false //Important! See issue #1075
            });

            $("#datetimeStartPicker").on("dp.change", function(e) {
                $("#datetimeEndPicker").data("DateTimePicker").minDate(e.date);
            });

            $("#datetimeEndPicker").on("dp.change", function(e) {
                $("#datetimeStartPicker").data("DateTimePicker").maxDate(e.date);
            });

        });
    </script>




    <script src="<?= base_url('assest/js/myjs.js') ?>"></script>
    <script src="<?= base_url('assest/js/date.js') ?>"></script>
</body>

</html>