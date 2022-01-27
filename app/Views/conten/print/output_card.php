<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding-top: 100px;
            background-color: #298EB9;
        }

        .card {
            background-color: #ffffff;
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            border: 4px solid #000;

            margin: auto;
            text-align: center;
        }

        .image_profile {
            width: 100%;
            border-radius: 5%;
        }

        .image_profile_qr {
            width: 80%;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 0px;
            padding-top: 0px;
            margin: 10px;
            border-radius: 10%;
        }

        h4 {
            margin-bottom: 16px;
            margin-top: 0px;
            padding: 0;
        }

        h1 {
            margin: 0;
            padding: 0;
        }

        a {
            font-size: 52px;
            padding: 14px 24px;
            text-decoration: none;
            color: #585858;
            border: 2px solid #e1e1e1;
            border-radius: 20px;
        }

        a:hover {
            background-color: #585858;
            color: #ffffff;
        }

        td {
            font-size: 36px;
        }

        table,
        table tr td {
            width: 600px;
            margin: 0 auto;
            border: 0px solid #e1e1e1;
            text-align: left;
        }

        #capture {
            width: max-content;
            height: max-content;
        }
    </style>

</head>

<body>
    <div id="capture">
        <table id="table_ui">
            <tr>
                <td>
                    <div class="card">
                        <table>
                            <tr>
                                <td style="width: 10%;">

                                    <img class="image_logo" src="<?= base_url("assest/logo/etw-color-Big.png") ?>" style="width: 100%;" alt="image" />
                                </td>
                                <td>
                                    <h5 style="color: #333A7C;">PT. ETOWA PACKAGING INDONESIA</h4>
                                </td>
                            </tr>
                        </table>
                        <img class="image_profile_qr" src="<?= base_url() . "/" . $file ?>" alt="image" />
                        <h3><strong>GBS</strong></h3>
                        <h2><strong><?= $name ?></strong></h2>
                        <h5><?= $badge ?></h5>
                    </div>
                </td>
            </tr>
        </table>

    </div>

    <script src="<?= base_url("assest/js/html2canvas.min.js") ?>"></script>

    <script>
        html2canvas(document.querySelector("#capture")).then(canvas => {
            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "<?= $name ?>.png";
            link.href = canvas.toDataURL("image/png");
            link.target = '_blank';
            link.click();
            window.close();
        });
    </script>
</body>

</html>