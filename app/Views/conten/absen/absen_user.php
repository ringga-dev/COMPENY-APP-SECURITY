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
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead text-white text-center" style="background-color: #F9B208;">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="card  mx-2 p-6 m-2 text-center" style=" width: 800px; background-color: #99C961;">
                    <div class="form-group" style="margin: 50px; ">
                        <h2 for="bet">Name:</h2>
                        <input type="text" class="form-control" id="bet" name="bet" autofocus="autofocus" style="margin: 20px;">

                        <button type="submit" id="btn_scan" class="btn btn-info">ABSEN</button>
                    </div>
                </div>
            </div>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0 mt-5 pt-5">Scan BET</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
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
                url: "<?= base_url('userapi/absen') ?>",
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
                            text: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            text: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                }
            });
        }
    </script>
</body>

</html>