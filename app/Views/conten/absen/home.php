<!DOCTYPE html>
<html lang="en">

<head>
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
    <script type="text/javascript" src="<?= base_url(); ?>/assest/js/myjava.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('tamplate/undian'); ?>/js/scripts.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('tamplate/admin'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg  text-uppercase fixed-top" id="mainNav" style="background-color: #242F59;">
        <div class="container">
            <h3 style="color: #fff;" class="navbar-brand">PT. Etowa Packaging Indonesia</h3>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead text-white text-center" style="background-color: #3B4E94; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <!-- Icon Divider-->
            <div class="divider-custom divider-light" style="margin-top: 20%;">
            </div>
            <div class="divider-custom divider-light p-1 m-1">
                <div class="divider-custom-line p-1 m-1"></div>
                <div id='jam' style="margin-top: 50px;"></div>
                <div class="divider-custom-line p-1 m-1"></div>
            </div>

            <div class="col-lg-12" id="visitor">
                <div class="card p-3 m-2 text-center" style=" background-color: #BCBCBD;">
                    <div class="form-group">
                        <h2>HOME APP VISITOR</h2>
                        <select class="custom-select custom-select-lg" id="visitor-data-satu" name="visitor-data-satu" required>
                            <option>Open this select</option>
                            <option value="masuk">IN</option>
                            <option value="keluar">OUT</option>
                        </select>
                        <div id="send_visitor" style="margin-top: 20px;">
                            <input type="text" class="form-control text-center " id="qr_visitor" name="qr_visitor" autofocus="autofocus">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="absen">
                <div class="card p-3 m-2 text-center" style=" background-color: #BCBCBD;">
                    <div class="form-group">
                        <h2>HOME APP ABSEN</h2>

                        <h2 for="bet">BET QR :</h2>
                        <input type="text" class="form-control text-center m-1" id="bet-absen" name="bet-absen" autofocus="autofocus">
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="izin">
                <div class="card p-3 m-2 text-center" style=" background-color: #BCBCBD;">
                    <div class="form-group">
                        <h2>HOME APP IZIN</h2>

                        <div class="card p-4" style=" background-color: #fff7;">
                            <div class="col-lg">
                                <h4>STATUS </h4>
                                <div class=" row">
                                    <select class="custom-select custom-select-lg" id="stts_izin" name="stts_izin" required>
                                        <option>Open this select</option>
                                        <option value="in">IN</option>
                                        <option value="out">OUT</option>
                                    </select>
                                </div>
                            </div>
                            <div id="send_izin" style="margin-top: 20px;">
                                <input type="text" class="form-control text-center " id="bet_izin" name="bet_izin" autofocus="autofocus">
                            </div>
                        </div>



                    </div>
                </div>
            </div>


            <div class="col-lg-12" id="izin_lot">
                <div class="card p-3 m-2 text-center" style=" background-color: #BCBCBD;">
                    <div class="form-group">
                        <h2>HOME APP IZIN LOT</h2>
                        <div class="card" style=" background-color: #fff7;">
                            <div class="card" style=" background-color: #fff1;">
                                <h4 style="color: #994544;">STATUS </h4>

                                <div class="col-lg">
                                    <select class="custom-select custom-select-lg mb-3" id="stts_lot_pos" name="stts_lot_pos">
                                        <option selected>Open this select</option>
                                        <option value="masuk">IN</option>
                                        <option value="keluar">OUT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row m-4" id="form-lokasi">
                                <div class="col-lg">
                                    <div class="row">
                                        <label for="lot7-to">FROM</label>
                                        <select class="custom-select custom-select-lg mb-3" id="lot-from" name="lot-from">
                                            <option>Open this select</option>
                                            <option value="lot 7">LOT 7</option>
                                            <option value="lot 1">LOT 1</option>
                                        </select>
                                    </div>

                                </div>


                                <div id="stts_lot" class="col-lg">
                                    <div class="row">
                                        <label for="lot7-to">TO</label>
                                        <select class="custom-select custom-select-lg mb-3" id="lot-to" name="lot-to">
                                            <option>Open this select</option>
                                            <option value="lot 7">LOT 7</option>
                                            <option value="lot 1">LOT 1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="send_izin_lot" style="margin-top: 20px;">
                            <input type="text" class="form-control text-center " id="bet_izin_lot" name="bet_izin_lot" autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card p-3 m-2 text-center" style=" background-color: #BCBCBD;">
                    <div class="form-group card">

                        <div class="row">
                            <button type="submit" id="menu_visito" class="btn btn-info col-lg m-3">VISITOR</button>
                            <button type="submit" id="menu_absen" class="btn btn-info col-lg m-3">ABSEN</button>
                            <button type="submit" id="menu_izin" class="btn btn-info col-lg m-3">IZIN</button>
                            <button type="submit" id="menu_izin_lot" class="btn btn-info col-lg m-3">IZIN LOT</button>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </header>








    <!-- Core theme JS-->


    <script type="text/javascript">
        $(document).ready(function() {

            function send_visitor(qr_visitor, stts_izin) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('UserApi/ajax_scan_visitor'); ?>",
                    data: {
                        'qr_code': qr_visitor,
                        'stts': stts_izin
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        if (response.stts == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: `${response.msg}`,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            $("#qr_visitor").val("");
                            textToAudio(response.msg)
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: `${response.msg}`,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            $("#qr_visitor").val("");
                            textToAudio(response.msg)
                        }

                        $("#qr_visitor").val("");

                    }
                });
            }

            function izinCekLot(lot_pos, lot_from = null, lot_to = null, bet_izin_lot, stts) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('UserApi/ajax_user_izin'); ?>",
                    data: {
                        'bet': bet_izin_lot,
                        'remarks': " ",
                        'dari': lot_from,
                        'menuju': lot_to,
                        'stts': stts
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        if (response.stts == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: `${response.msg}`,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            $("#bet_izin_lot").val("");
                            textToAudio(response.msg)
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: `${response.msg}`,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            $("#bet_izin_lot").val("");
                            textToAudio(response.msg)
                        }

                        $("#bet_izin_lot").val("");
                    }
                });
            }

            function izinCekOut(badge, stts) {
                // console.log(`${badge}, ${stts}`);
                $.ajax({
                    type: "post",
                    url: '<?= base_url('UserApi/ajax_form_cekout'); ?>',
                    data: {
                        'badge': badge,
                        'stts': stts
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        if (response.stts == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: `${response.msg}`,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            $("#bet_izin").val("");
                            textToAudio(response.msg)
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: `${response.msg}`,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            $("#bet_izin").val("");
                            textToAudio(response.msg)
                        }

                        $("#bet_izin").val("");
                    }
                });
            }

            $("#stts_lot_pos").change(function() {
                if ($("#stts_lot_pos").val() == "masuk") {
                    $("#send_izin_lot").show()
                    $("bet_izin_lot").focus()
                    $("#form-lokasi").hide()
                } else {
                    $("#form-lokasi").show()
                    $("#send_izin_lot").hide()
                }

            })

            $("#lot-from").change(function() {
                $("#stts_lot").show()
            })

            $("#lot-to").change(function() {
                $("#send_izin_lot").show()
                $("bet_izin_lot").focus()
            })

            $("#send_visitor").hide()

            $("#visitor-data-satu").click(function() {
                $("#send_visitor").show()
            })
            // izin lot scema stop

            $("#qr_visitor").on('keypress', function(e) {
                if (e.which == 13) {

                    if ($("#qr_visitor").val() && $("#visitor-data-satu").val()) {
                        send_visitor($("#qr_visitor").val(), $("#visitor-data-satu").val())
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `
                                            data masih ada yang kosong `,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        textToAudio(`
                                            data masih ada yang kosong `)
                    }
                }
            });

            $("#bet-absen").on('keypress', function(e) {
                if (e.which == 13) {
                    send_absen()
                }
            });

            //izin cek out
            $("#bet_izin").on('keypress', function(e) {
                if (e.which == 13) {
                    // send_absen()
                    if ($("#bet_izin").val() && $("#stts_izin").val()) {
                        izinCekOut($("#bet_izin").val(), $("#stts_izin").val())
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `
                                            data masih ada yang kosong `,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        textToAudio(`
                                            data masih ada yang kosong `)
                    }

                }
            });

            $("#bet_izin_lot").on('keypress', function(e) {
                if (e.which == 13) {
                    // send_absen()
                    console.log("izin lot enter")

                    // send_absen()
                    if ($("#stts_lot_pos").val() == "keluar") {
                        if ($("#stts_lot_pos").val() && $("#lot-from").val() && $("#lot-to").val() && $("#bet_izin_lot").val()) {
                            izinCekLot($("#stts_lot_pos").val(), $("#lot-from").val(), $("#lot-to").val(), $("#bet_izin_lot").val(), $("#stts_lot_pos").val())
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: `
                                            data masih ada yang kosong `,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            textToAudio(`
                                            data masih ada yang kosong `)
                        }

                    } else {
                        if ($("#bet_izin_lot").val()) {
                            izinCekLot($("#stts_lot_pos").val(), "", "", $("#bet_izin_lot").val(), $("#stts_lot_pos").val())
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: `
                                            data masih ada yang kosong `,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            textToAudio(`
                                            data masih ada yang kosong `)
                        }
                    }


                }
            });



        });

        function send_absen() {
            let data = $('#bet-absen').val()

            $.ajax({
                type: "post",
                url: "<?= base_url('userapi/absen_etowa') ?>",
                data: {
                    bet: data
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);

                    if (response.stts == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('#bet-absen').val("")

                        textToAudio(response.txt)
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('#bet-absen').val("")

                        textToAudio(response.txt)
                    }
                    $('#bet-absen').val("")

                }
            });
        }


        /* JS comes here */
        function textToAudio(msg) {
            let speech = new SpeechSynthesisUtterance();
            speech.lang = "id-ID";

            speech.text = msg;
            speech.volume = 10;
            speech.rate = 0.8;
            speech.pitch = 1;

            window.speechSynthesis.speak(speech);
        }

        window.setTimeout("waktu()", 1000);
    </script>

    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = `<h1  style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: #000;">${tanggal.getHours()} : ${tanggal.getMinutes()} : ${tanggal.getSeconds()}</h1>`
        }
    </script>
</body>

</html>