<?php
function cek_akses($role_id, $menu_id)
{
    $db = \Config\Database::connect();

    $result = $db->table('tblweb_aksesmenu')->where(['privilege_id ' => $role_id, 'menu_id' => $menu_id])->get()->getRowArray();
    if ($result != null) {
        return "checked='checked'";
    }
}

function  cek_blok($nik)
{

    $db = \Config\Database::connect();

    $data = $db->table('admin_web')->where(['nik' => $nik])->get()->getRowArray();

    if ($data['enable_login'] == 1) {
        echo "checked";
    } else {
        echo "";
    }
}

function cek_stts_hadia($id)
{
    $db = \Config\Database::connect();

    $data =  $db->table('user_undian')->where(['hadiah' => $id])->get()->getRowArray();
    if ($data) {
        echo "hidden";
    } else {
        echo "";
    }
}

function  cek_blok_userApp($id)
{

    $db = \Config\Database::connect();

    $data = $db->table('user_app')->where(['id' => $id])->get()->getRowArray();

    if ($data['enable_login'] == 1) {
        echo "checked";
    } else {
        echo "";
    }
}

function  cek_blok_userAppHOD($id)
{
    $db = \Config\Database::connect();

    $data = $db->table('user_app')->where(['id' => $id])->get()->getRowArray();

    if ($data['enable_hod_app'] == 1) {
        echo "checked";
    } else {
        echo "";
    }
}

function cek_upah()
{
    $db = \Config\Database::connect();

    $data = $db->table('app_company')->select('upah_user_harian')->get()->getRowArray();
    return $data['upah_user_harian'];
}

function rupiah($nominal)
{
    return "Rp " . number_format($nominal, 2, ',', '.');
}

function getBPJS($badge)
{
    $db = \Config\Database::connect();

    $data = $db->table('setting_user_harian')->where(['badge' => $badge])->get()->getRowArray();
    return $data['bpjs'];
}

function get_user($badge)
{
    $db = \Config\Database::connect();
    return $db->table('user_app')->where(['id_bet' => $badge])->get()->getRowArray();
}

function bulan($bulan)
{
    switch ($bulan) {
        case "1":
            $bulan = "Januari";
            break;
        case "2":
            $bulan = "Februari";
            break;
        case '3':
            $bulan = "Maret";
            break;
        case '4':
            $bulan = "April";
            break;
        case '5':
            $bulan = "Mei";
            break;
        case '6':
            $bulan = "Juni";
            break;
        case '7':
            $bulan = "Juli";
            break;
        case '8':
            $bulan = "Agustus";
            break;
        case '9':
            $bulan = "September";
            break;
        case '10':
            $bulan = "Oktober";
            break;
        case '11':
            $bulan = "November";
            break;
        case '12':
            $bulan = "Desember";
            break;
        case '01':
            $bulan = "Januari";
            break;
        case '02':
            $bulan = "Februari";
            break;
        case '03':
            $bulan = "Maret";
            break;
        case '04':
            $bulan = "April";
            break;
        case '05':
            $bulan = "Mei";
            break;
        case '06':
            $bulan = "Juni";
            break;
        case '07':
            $bulan = "Juli";
            break;
        case '08':
            $bulan = "Agustus";
            break;
        case '09':
    }
    return $bulan;
}
