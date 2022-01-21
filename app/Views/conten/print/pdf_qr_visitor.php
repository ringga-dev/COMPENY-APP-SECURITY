<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        th,
        td,
        tr {
            border: 1px solid black;
            border-collapse: collapse;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        #table {
            border: 2px solid black;
            border-collapse: collapse;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        td {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 10px;
            padding: 10px;
        }



        h1,
        #table {
            text-align: center;
        }

        table {
            width: 100%;
        }

        h1,
        h4 {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 1px;
        }

        hr.new5 {
            border: 10px solid black;
            border-radius: 4px;
            height: 5px;
            margin: 1px;
        }
    </style>
</head>

<body>



    <table style=" border: none; ">
        <tr style=" border: none;">
            <th style="width: 10%; text-align: left;border: none">
                <img src="<?= base_url(); ?>/assest/logo/etw-color-Big.png" class="brand-image elevation-3" style="width: 10%;">
            </th>
            <th style="width: 90%; text-align: center;border: none">
                <h1><?= $title; ?></h1>
            </th>
        </tr>
    </table>
    <hr class="new5" />

    <table style=" border: none; ">
        <tr style=" border: none;">
            <th style="width: 50%; text-align: left;border: none">

                <h4><?= $date; ?></h4>
            </th>
            <th style="width: 50%; text-align: right;border: none">
                <h4><?= $judul; ?></h4>
            </th>
        </tr>
    </table>

    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Timetable</th>
                <th>Necessities</th>
                <th>Dept</th>
                <th>Sign</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 0;
            foreach ($visitor as $u) :

                $i++ ?>
                <tr>
                    <td><?= $i ?></td>
                    <td style="font-size: 15px; width: 40%;   text-align: left;"><?= $u['nama']; ?></td>
                    <td><?= $u['jadwal']; ?></td>
                    <td><?= $u['keperluan']; ?></td>
                    <td><?= $u['bertemu']; ?></td>
                    <td style="width: 100px; height: 50px;"> </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>