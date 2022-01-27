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
            max-width: 50%;
            padding: 20px;
            border-radius: 10px;
        }

        .card__media {
            flex: 0 0 165px;
            height: 50%;
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
            font-size: 15px;
        }

        .card__title {
            margin-bottom: 10px;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .card__link {
            color: #000a12;
            text-decoration: none;
            font-size: 10px;
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

    <div class="card" style="padding-top: 5px; margin-top: 5px; width: 25%; height: 20%; text-align: center;" data-seo-container>
        <table>
            <tbody>
                <tr>
                    <td>
                        <?php
                        //quick and simple:
                        // $lokasi = base_url("assets/image/qr/$name.png");
                        ?>
                        <div class="card__media">
                            <img src="<?= $file ?>" style="height: 100%;" alt="photo placeholder">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="card__content">
            <p class="card__category"></p>
            <h2 class="card__title">
                <a class="card__link" style="font-size: 10px;" target="_blank" data-seo-target><?= $name ?></a>
            </h2>
            <p class="card__excerpt"><?= $badge ?></p>
        </div>
        <!-- DivTable.com -->
    </div>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('tamplate/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('tamplate/admin') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>