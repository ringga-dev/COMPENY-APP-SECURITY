<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background: rgb(182, 195, 250);
        }

        .card-img {
            border-radius: 10;
        }

        .vgr-cards .card {
            display: flex;
            flex-flow: wrap;
            flex: 100%;
            margin-bottom: 9.35px;
            margin-top: 9.35px;
        }

        .vgr-cards .card:nth-child(even) .card-img-body {
            order: 2;
        }

        .vgr-cards .card:nth-child(even) .card-body {
            padding-left: 0;
            padding-right: 0;
        }

        .vgr-cards .card-img-body {
            overflow: hidden;
            position: relative;
        }

        .vgr-cards .card-img {
            width: 100%;
            height: auto;
            position: absolute;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .vgr-cards .card-body {
            flex: 4;
            padding: 0 0 0 2.25rem;
        }

        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 8px 8px 8px 8px rgba(0, 16, 87);
            transition: 0.3s;
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }

        vgr-cards {
            page-break-inside: avoid;
            page-break-after: auto
        }
    </style>
</head>

<body>
    <?php
    $data = round(count($qr_location) / 3, 0);
    $pecah = array_chunk($qr_location, 3);
    // dd($pecah);
    for ($i = 0; $i < count($pecah); $i++) :
    ?>
        <page size="A4" style="padding: 20px;" style=" page-break-after: auto;">

            <?php foreach ($pecah[$i] as $u) : ?>
                <div class="card-group vgr-cards" style=" display: flex; align-items: center;">
                    <div class="card" style="height: 25%;">
                        <div class="card-img-body" style="height: 100%;">
                            <?php
                            $nama = $u['qr'];
                            //quick and simple:
                            $lokasi = base_url("assets/image/qr/$nama.png");
                            ?>
                            <img class="ok-download" src="<?= $lokasi ?>" />
                        </div>
                        <div class="card-body">
                            <h2 class="text" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 20px;"><?= $u['stts']; ?></h2>
                            <h2 class="text" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 20px"><?= $u['qr']; ?></h2>
                            <h3 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight: normal; font-size: 15px">
                                <?= $u['dec']; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </page>
    <?php endfor; ?>
    <script>
        window.print();
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('tamplate/admin') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>