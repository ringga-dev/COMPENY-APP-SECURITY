<!DOCTYPE html>
<html>

<head>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            /* background-color: #000a12; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: solid;
            border-color: #000a12;
            display: flex;
            align-items: center;
            background-color: #fff;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
        }

        .card__media {
            flex: 0 0 165px;
            height: 210px;
            margin-right: 20px;
            border-radius: 5px;
            overflow: hidden;
        }

        .card__content {
            flex: 1;
        }

        .card__category {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: bold;
            color: #4f5b62;
            font-size: 20px;
        }

        .card__title {
            margin-bottom: 10px;
            font-size: 20px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .card__link {
            color: #000a12;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        .card__link:hover {
            color: #ef6c00;
        }

        .card__excerpt {
            color: #263238;
            font-size: 15px;
        }

        [data-seo-container] {
            position: relative;
            cursor: pointer;
        }

        [data-seo-container] [data-seo-target]::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
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
        <?php foreach ($pecah[$i] as $u) : ?>
            <div class="card" style="padding-top: 10px; margin-top: 10px; height: 210px;" data-seo-container>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                $nama = $u['qr'];
                                //quick and simple:
                                $lokasi = base_url("assets/image/qr/$nama.png");
                                ?>
                                <div class="card__media">
                                    <img src="<?= $lokasi ?>" style="height: 200px;" alt="photo placeholder">
                                </div>
                            </td>
                            <td>
                                <div class="card__content">
                                    <p class="card__category"><?= $u['qr']; ?></p>
                                    <h2 class="card__title">
                                        <a class="card__link" style="font-size: 20px;" target="_blank" data-seo-target><?= $u['stts']; ?></a>
                                    </h2>
                                    <p class="card__excerpt"> <?= $u['dec']; ?></p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- DivTable.com -->
            </div>


        <?php endforeach; ?>

    <?php endfor; ?>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('tamplate/admin') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>