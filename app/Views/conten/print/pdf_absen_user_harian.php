<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .table1 {
        font-family: sans-serif;
        color: #000000;
        border-collapse: collapse;
        width: 100%;
    }

    .table1,
    .thview {
        border: 0.01px solid rgb(0, 0, 0);
        padding: 0px 0px;
        font-size: 10px;
        text-align: center;
    }

    body {
        font-family: 'Source Sans Pro';
        margin: 0;
    }

    header {
        background: #FFFFFF;
        padding: 1em;
    }

    hr {
        border: 1px solid black;
    }

    .total_color {
        background-color: yellow;
    }

    br,
    hr {
        margin: 0%;
        padding: 0%;
    }

    h5,
    h6,
    th,
    td {
        margin: 0%;
        padding: 0%;
        font-size: 10px;
        font-weight: 100;
    }

    .viewTable {
        width: 100%;
    }

    .updata {
        font-size: 10px;
        width: 50%;
        text-align: left;
    }

    .size {
        width: 25%;
        font-size: 10px;
        text-align: left;
    }
</style>
<?php $data_user = get_user($badge);
//dd($data_user) 
?>

<body>
    <table class="viewTable">
        <tr class="size">
            <th class="size">BADGE</th>
            <th class="size">:<?= $data_user['id_bet']; ?></th>
            <th class="size">Employee Title </th>
            <th class="size"> :</th>
        </tr>

        <tr class="size">
            <th class="size">Employee Code</th>
            <th class="size"> :</th>
            <th class="size">Employee Hire Date</th>
            <th class="size">:</th>
        </tr>
        <tr class="size">
            <th class="size">Employee Name</th>
            <th class="size">:<?= $data_user['name']; ?></th>
            <th class="size">Departement Name</th>
            <th class="size">:</th>
        </tr>
    </table>

    <br>
    <h5 style="text-align: center; width: 100%;"> Date : <?= $dateView; ?></h5>
    <br>
    <table class="table1">
        <tr class="thview">
            <th class="thview" rowspan="2">No</th>
            <th class="thview" rowspan="2">Date</th>
            <th class="thview" rowspan="2">DAY</th>
            <th class="thview" rowspan="2">Working Hrs</th>
            <th class="thview" colspan="2">Pluch Card Record</th>
            <th class="thview" rowspan="2">Jam</th>
            <th class="thview" rowspan="2" width="20%">Remark</th>
        </tr>
        <tr class="thview">
            <th class="thview">in</th>
            <th class="thview">out</th>
        </tr>
        <?php
        $i = 0;
        $daftar_hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $total_jam = 0;
        foreach ($data as $d) {
            if (count($d['data']) < 1) {
                continue;
            }
            $text = count($d['data']) < 1 ? "Hari Off" : "Hari Masuk";

            $jam_kerja = 0;
            $dateIN = [];
            $dateOUT = [];
            $stts = 1;
            foreach ($d['data'] as $da) {
                if ($stts % 2 == 0) {
                    array_push($dateOUT, $da['date']);
                } else {
                    array_push($dateIN, $da['date']);
                }
                $stts++;
            }

            for ($i = 0; $i < count($dateIN); $i++) {
                $waktu_awal        = strtotime($dateIN[$i]);
                $waktu_akhir    = strtotime($dateOUT[$i]); // bisa juga waktu sekarang now()

                //menghitung selisih dengan hasil detik
                $diff    = $waktu_akhir - $waktu_awal;

                //membagi detik menjadi jam
                $jam_kerja    += floor($diff / (60 * 60));
                if ($jam_kerja > 8) {
                    $jam_kerja = 8;
                }
            }
        ?>
            <tr class="thview">
                <td class="thview"><?= $i++; ?></td>
                <td class="thview"><?= $d['date']; ?></td>
                <td class="thview"><?= $daftar_hari[date('l', strtotime($d['date']))]; ?></td>
                <td class="thview"><?= $text; ?></td>
                <td class="thview"><?= $dateIN != null ? date_format(date_create($dateIN[0]), "H:i:s") : "libur"; ?></td>
                <td class="thview"><?= $dateOUT != null ? date_format(date_create($dateOUT[count($dateOUT) - 1]), "H:i:s") : "libur"; ?></td>
                <td class="thview"><?= $jam_kerja < 1 ? "libur" : $jam_kerja; ?></td>
                <td class="thview">tahun baru 2022</td>
            </tr>

        <?php $total_jam += $jam_kerja;
        } ?>
        <tr>
            <td style="border: 1;" colspan="6">TOTAL</td>
            <td style="border: 1;"><?= $total_jam; ?></td>
            <td style="border: 1;"></td>
        </tr>
    </table>
    <br />
    <h5><strong>Upah periode 01 - 31 januari 2020</strong></h5>

    <table class="viewTable">
        <tr class="updata">
            <td class="updata">Upah/jam</td>
            <td class="updata">:<?= rupiah(cek_upah()); ?></td>
        </tr>
        <tr class="updata">
            <th class="updata">Total Jam</th>
            <th class="updata">:<?= $total_jam; ?></th>
        </tr>
        <tr class="updata">
            <th class="updata">Total </th>
            <th class="updata">
                <h6 class="updata total_color">
                    <hr>
                    :Rp <?= rupiah(cek_upah() * $total_jam) ?>
                </h6>
            </th>
        </tr>
        <tr class="updata">
            <th class="updata">BPJS</th>
            <th class="updata">:<?= rupiah(getBPJS($badge)); ?></th>
        </tr>
        <tr class="updata">
            <th class="updata">
                <br> Take Home Pay
            </th>
            <!-- total ini merupkan jam kerja * gaji/jam + bpjs -->
            <th class="updata "><br>
                <hr> <strong class="total_color"> : <?= rupiah((cek_upah() * $total_jam) + getBPJS($badge)) ?></strong>
            </th>

        </tr>


    </table>
    <br />

    <!-- 
    <h5>Rincian Overtime 01 - 31 januari 2020</h5>

    <table class="viewTable">
        <tr class="updata">
            <td class="updata">Overtime</td>
            <td class="updata">:Rp 786445</td>
        </tr>
        <tr class="updata">
            <th class="updata"> </th>
            <th class="updata">:Rp -</th>
        </tr>
        <tr class="updata">
            <th class="updata"> </th>

            <th class="updata">
                <hr>:Rp 786455
            </th>
        </tr>
        <tr class="updata">
            <th class="updata"></th>
            <th class="updata">
                <h6 class="updata total_color">
                    :Rp 786455 (Overtime yang dibayarkan)
                </h6>
            </th>
        </tr>

    </table> -->


    <br />
    <h5>Node : Mohon Dibayarkan Upah + Overtime 1 orang atas nama <strong><?= $data_user['name']; ?></strong> sebesar angka yang tertera di atas</h5>

    <br />
    <table style="width: 100%; text-align: center;">
        <tr>
            <td>Di Buat</td>
            <td>DiCheck oleh</td>
            <td>Disetujui Oleh</td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br></td>
            <td><br><br><br><br><br><br></td>
            <td><br><br><br><br><br><br></td>
        </tr>

        <tr>
            <td>Dewi Sartika</td>
            <td> Devi/Sarina</td>
            <td>KH Lee</td>
        </tr>
    </table>



</body>

</html>