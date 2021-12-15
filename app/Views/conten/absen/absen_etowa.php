<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ABSENSI PT ETOWA</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('tamplate/undian'); ?>/css/styles.css" rel="stylesheet" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('tamplate/admin'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
    <nav class="navbar navbar-expand-lg  text-uppercase fixed-top" id="mainNav" style="background-color: #F98404;">
        <div class="container">
            <a class="navbar-brand">PT Etowa Packaging Indonesia</a>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead text-white text-center" style="background-color: #F9B208; height: 90%;">
        <div class="container d-flex align-items-center flex-column">
            <!-- Icon Divider-->
            <div class="divider-custom divider-light p-0 m-0">
                <div class="divider-custom-icon"><i class="fas fa-star m-1"></i></div>
            </div>
            <div class="divider-custom divider-light p-1 m-1">
                <div class="divider-custom-line p-1 m-1"></div>
                <div id='jam'></div>
                <div class="divider-custom-line p-1 m-1"></div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card p-3 m-2 text-center col-12" style=" background-color: #99C961;">
                    <div class="form-group">
                        <h2 for="bet">BET QR :</h2>
                        <input type="text" class="form-control text-center m-1" id="bet" name="bet" autofocus="autofocus">
                        <button type="submit" id="btn_scan" class="btn btn-info  m-1">ABSEN</button>
                    </div>
                </div>
            </div>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0 mt-5 pt-5">Scan BET</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star m-1"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star m-1"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star m-1"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star m-1"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star m-1"></i></div>
                <div class="divider-custom-line"></div>
            </div>

        </div>
    </header>


    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-secondary m-0 p-0" style="background-color: #F98404;">
        <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
    </div>


    <!-- Core theme JS-->
    <script src="<?= base_url('tamplate/undian'); ?>/js/scripts.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assest/js/jquery.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('keypress', function(e) {
                if (e.which == 13) {
                    send_absen()
                }
            });

            $('#btn_scan').click(function() {

                send_absen()
            });
        });

        function send_absen() {
            let data = $('#bet').val()

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
                            title: `<h1>Berhasil Absen</h1>`,
                            html: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        textToAudio(response.txt)
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        textToAudio(response.txt)
                    }
                    $('#bet').val("")
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