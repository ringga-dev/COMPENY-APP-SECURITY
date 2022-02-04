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
                        <span class="info-box-text">IP </span>
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
                        <span class="info-box-text">Lokasi </span>
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
                        <!-- <div class="card-body ">
                            <script src="<?= base_url('assest/animasi/js') ?>/lottie-player.js"></script>
                            <lottie-player class="text-center" src="<?= base_url('assest/animasi/wellcome.json') ?>" background="transparent" speed="0.5" style="width: auto; height: auto;" loop autoplay></lottie-player>
                        </div> -->
                        <form class="mb-3">

                            <div class="row">
                                <div class="form-group col-lg">
                                    <input type="number" class="form-control" id="date" aria-describedby="date" placeholder="YEAR">
                                </div>


                                <button type="submit" id="share" class="btn btn-warning col-lg-1"><i class="fas fa-search fa-2x"></i></button>
                            </div>

                        </form>
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Failed For Finger</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- izin lot-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">IZIN LOT</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="izin_lot" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- LIST PATROL-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"> LIST PATROL</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="list_patrol" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- USER LATE-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"> USER LATE</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="user_late" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


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

<script>
    $(document).ready(function() {

        $("#share").click(function() {
            getData()
        })
        if ($("#date").val() != null) {
            getData()
        } else {
            getData()
        }

    });

    var datasetFFF = []
    var IzinLot = []
    var ListPatrol = []
    var LateUserMasuk = []
    var LateUserBreak = []

    function getData() {
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>/userapi/failed_for_finger",
            data: {
                'date': $("#date").val()
            },
            dataType: "json",
            success: function(response) {
                console.log(response)

                datasetFFF = response.FailedForFinger
                IzinLot = response.IzinLot
                ListPatrol = response.ListPatrol
                ListPatrol = response.ListPatrol
                LateUserMasuk = response.LateUser.LateUserMasuk
                LateUserBreak = response.LateUser.LateUserBreak
                chart()
            }
        })
    }

    function chart() {

        //User Late

        var userLatechart = {
            labels: ["januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "desember"],
            datasets: [{
                label: 'IN',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: LateUserMasuk
            }, {
                label: 'BREAK',
                backgroundColor: 'rgba(60,141,18,0.9)',
                borderColor: 'rgba(60,141,18,0.8)',
                pointRadius: false,
                pointColor: '#3b8',
                pointStrokeColor: 'rgba(60,141,18,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,18,1)',
                data: LateUserMasuk
            }]
        }


        var userLateCanva = $('#user_late').get(0).getContext('2d')
        var barChartDatauserLate = $.extend(true, {}, userLatechart)
        var temp0userLate = userLatechart.datasets[0]
        var temp1userLate = userLatechart.datasets[1]
        barChartDatauserLate.datasets[0] = temp0userLate
        barChartDatauserLate.datasets[1] = temp1userLate

        var barChartOptionsuserLate = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }

        }
        new Chart(userLateCanva, {
            type: 'bar',
            data: barChartDatauserLate,
            options: barChartOptionsuserLate,
        })




        //LIST PATROL
        var lsitPatrolchart = {
            labels: ["januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "desember"],
            datasets: [{
                label: 'LOT 1 - LOT 7',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: ListPatrol
            }]
        }


        var list_patrolCanva = $('#list_patrol').get(0).getContext('2d')
        var barChartDatalist_patrol = $.extend(true, {}, lsitPatrolchart)
        var temp0list_patrol = lsitPatrolchart.datasets[0]
        barChartDatalist_patrol.datasets[0] = temp0list_patrol

        var barChartOptionslist_patrol = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }

        }
        new Chart(list_patrolCanva, {
            type: 'bar',
            data: barChartDatalist_patrol,
            options: barChartOptionslist_patrol,
        })







        //IZIN LOT 
        var izinLotchart = {
            labels: ["januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "desember"],
            datasets: [{
                label: 'LOT 1 - LOT 7',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: IzinLot
            }]
        }

        var izin_lotCanva = $('#izin_lot').get(0).getContext('2d')
        var barChartDataIzinLot = $.extend(true, {}, izinLotchart)
        var temp0IzinLot = izinLotchart.datasets[0]
        barChartDataIzinLot.datasets[0] = temp0IzinLot

        var barChartOptionsIzinlot = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }

        }
        new Chart(izin_lotCanva, {
            type: 'bar',
            data: barChartDataIzinLot,
            options: barChartOptionsIzinlot,
        })






        //FailedForFinger
        var areaChartData = {
            labels: ["januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "desember"],
            datasets: [{
                label: 'Failed For Finger',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: datasetFFF
            }]
        }


        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }

        }
        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions,
        })
    }
</script>

<?= $this->endSection(); ?>