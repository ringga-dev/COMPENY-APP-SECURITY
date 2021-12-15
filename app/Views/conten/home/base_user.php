<?= $this->extend('base_ui/ui_tamplate'); ?>
<?= $this->extend('base_ui/base_menu'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">IP Kamu</span>
                        <span class="info-box-number">
                            <?php $exec = 'ipconfig | findstr /R /C:"IPv4.*"';
                            // exec($exec, $output);
                            // preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
                            // print_r($matches[0]);


                            ?>
                            <?= $_SERVER['REMOTE_ADDR'] ?>

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <script>
                $(document).ready(function() {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        tampilLokasi(position);
                    }, function(e) {
                        // alert('Geolocation Tidak Mendukung Pada Browser Anda');
                    }, {
                        enableHighAccuracy: true
                    });
                });

                function tampilLokasi(posisi) {
                    //console.log(posisi);
                    var latitude = posisi.coords.latitude;
                    var longitude = posisi.coords.longitude;
                    $('.lokasi').html(`${latitude}, ${longitude}`);
                }
            </script>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-map-pin"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Lokasi Kamu</span>
                        <span class="info-box-number lokasi"></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-desktop"></i></span>
                    <?php

                    $uaFull = strtolower($_SERVER['HTTP_USER_AGENT']);
                    $data = explode('(', $uaFull);
                    $data2 = explode(')', $data[1]);


                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text"> Device Root</span>
                        <span class="info-box-number"> <?= $data2[0] ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-firefox-browser"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Browser</span>
                        <span class="info-box-number"><?php
                                                        $arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

                                                        $agent = $_SERVER['HTTP_USER_AGENT'];

                                                        $user_browser = '';
                                                        foreach ($arr_browsers as $browser) {
                                                            if (strpos($agent, $browser) !== false) {
                                                                $user_browser = $browser;
                                                                break;
                                                            }
                                                        }
                                                        switch ($user_browser) {
                                                            case 'MSIE':
                                                                $user_browser = 'Internet Explorer';
                                                                break;

                                                            case 'Trident':
                                                                $user_browser = 'Internet Explorer';
                                                                break;

                                                            case 'Edg':
                                                                $user_browser = 'Microsoft Edge';
                                                                break;
                                                        }

                                                        echo $user_browser;
                                                        ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body ">
                            <script src="<?= base_url('assest/animasi/js') ?>/lottie-player.js"></script>
                            <lottie-player class="text-center" src="<?= base_url('assest/animasi/wellcome.json') ?>" background="transparent" speed="0.5" style="width: auto; height: auto;" loop autoplay></lottie-player>
                        </div>
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>