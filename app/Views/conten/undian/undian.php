<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hiburan PT ETOWA</title>
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


                <?php $i = 1;
                // for ($i = 0; $i < 100; $i++) :
                foreach ($user as $u) :
                ?>
                    <button <?= cek_stts_hadia($u['id']) ?> onclick="hadia(<?= $u['id']; ?>)" class="btn btn-outline-light mx-2 p-0 m-2 text-center" style="width: 250px; height: 150px;">
                        <h3><?= $u['id']; ?></h3>
                        <h5><?= $u['barang']; ?></h5>
                    </button>

                <?php endforeach;
                //endfor; 
                ?>
            </div>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0 mt-5 pt-5">HADIAH UNDIAN</h1>
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
    <!-- Portfolio Modal 6-->
    <div class="portfolio-modal modal" id="modal_undia" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
        <div class="modal-dialog modal-xl ">
            <div class="modal-content" style="background-color: #16697A;">
                <div class="modal-header border-0" style="background-color: #16697A;"><button class="btn-close" type="button" id="close_modal" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8" style="background-color: #16697A;">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title  text-uppercase mb-0" style="color: #ffd700;">Undi</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line" style="background-color: #ffd700;"></div>
                                    <div class="divider-custom-icon" style="color: #ffd700;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line" style="background-color: #ffd700;"></div>
                                </div>
                                <h3 class="portfolio-modal-title  text-uppercase mb-0" style="color: #ffd700;" id="id_hadia">Nomer</h3>
                                <!-- Portfolio Modal - Image-->
                                <div class="card-body ">
                                    <script src="<?= base_url('assest/animasi/js') ?>/lottie-player.js"></script>
                                    <div class="divider-custom-icon" id="animasi">

                                    </div>

                                    <div class="divider-custom-icon" style="width: auto; height: 300px; background-color: #AEE6E6;  border-radius: 25px;
                                    border: 5px solid #ffd700;
                                    padding: 20px;" id="pemenang">

                                    </div>
                                    <button class='btn btn-success mt-1' type='submit' id='terima' style="border-radius: 25px;
                                    border: 5px solid #ffd700;" data-bs-dismiss='modal'>TERIMA</button>
                                </div>
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4"></p>
                                <button class="btn btn-primary" style="border-radius: 20px;
                                    border: 3px solid #ffd700;" type="submit" id="mengundi" data-bs-dismiss="modal">
                                    MENGUNDI
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->

    <!-- Core theme JS-->
    <script src="<?= base_url('tamplate/undian'); ?>/js/scripts.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assest/js/jquery.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
        let hadiah = "";

        function hadia(id) {
            hadiah = "";
            hadiah = id;
            $('#modal_undia').show();
            $('#id_hadia').text(`ID Hadiah : ${hadiah}`);
        }
        $(document).ready(function() {
            $('#terima').hide();
            $('#animasi').hide();

            $('#close_modal').click(function() {
                $('#modal_undia').hide();
                $('#pemenang').remove();
                hadiah = "";
                location.reload();
            });
            $('#mengundi').click(function() {
                var audio1 = new Audio('<?= base_url() ?>/assest/sound/load.mp3');
                var audio2 = new Audio('<?= base_url() ?>/assest/sound/win.mp3');
                audio1.play();
                audio2.play()
                $('#animasi').show();
                $('#animasi').html('<lottie-player id="lottie" src="<?= base_url('assest/animasi/gold-cracking.json') ?>" background="transparent" speed="1" style="width: auto; height: 500px;" loop autoplay></lottie-player>');
                $('#pemenang').hide();

                $.ajax({
                    type: "get",
                    url: "<?= base_url('home/win') ?>",
                    dataType: "json",
                    success: function(response) {
                        setTimeout(function() {
                            $('#animasi').hide();
                            $('#lottie').remove();
                            $('#pemenang').show();
                            $('#pemenang').html(
                                "<h3>Selamat Kepada</h3>" +
                                `<h1>${response.name}</h1>` +
                                `<h1> ID : ${response.bet_id}</h1>` +
                                `<h1 id="id_user">LIST : ${response.id}</h1>` +
                                "" +
                                "");
                            $('#terima').show();
                        }, 3000);
                    }
                });

            })

            $('#terima').click(function() {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('home/terima_hadia'); ?>",
                    data: {
                        id_hadia: $('#id_hadia').text(),
                        id_user: $('#id_user').text(),
                    },
                    dataType: "json",
                    success: function(response) {
                        user_hadia = "";
                        Swal.fire({
                            position: 'center',
                            icon: response.stts == true ? 'success' : "warning",
                            title: `${response.msg}`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                });
            });
        });
    </script>
</body>

</html>