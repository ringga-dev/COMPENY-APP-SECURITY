<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function getUser()
    {
        return $this->db->table('admin_web')->get()->getResultArray();
    }


    public function hapusUser($id)
    {
        $this->db->table('admin_web')->where(['nik' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function aksesBlok($nik)
    {
        $data = $this->db->table('admin_web')->where(['nik' => $nik])->get()->getRowArray();
        if ($data['enable_login'] == 1) {
            $this->db->table('admin_web')->where(['nik' => $nik])->update(['enable_login' => 2]);
            return ['stts' => false, 'msg' => 'Akses di blok...!'];
        } else {
            $this->db->table('admin_web')->where(['nik' => $nik])->update(['enable_login' => 1]);
            return ['stts' => true, 'msg' => 'Akses di berikan...!'];
        }
    }

    public function aksesBlok_userApp($id)
    {
        $data = $this->db->table('user_app')->where(['id' => $id])->get()->getRowArray();
        if ($data['enable_login'] == 1) {
            $this->db->table('user_app')->where(['id' => $id])->update(['enable_login' => 2]);
            return ['stts' => false, 'msg' => 'Akses di blok...!'];
        } else {
            $this->db->table('user_app')->where(['id' => $id])->update(['enable_login' => 1]);
            return ['stts' => true, 'msg' => 'Akses di berikan...!'];
        }
    }

    public function getUserApp()
    {
        return $this->db->table('user_app')->get()->getResultArray();
    }


    public function getUserSecurity()
    {
        return $this->db->table('user_app')->where(['devisi' => "security"])->get()->getResultArray();
    }

    public function deleteUser($nik)
    {
        $this->db->table('user_app')->where(['nik' => $nik])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function hapusUserApp($id)
    {
        $this->db->table('user_app')->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function getQrLocation()
    {
        return $this->db->table('mas_qr_location')->get()->getResultArray();
    }

    public function saveQRlokasi($data)
    {
        $cek = $this->db->table('mas_qr_location')
            ->where(['qr' => $data['qr']])
            ->get()->getRowArray();

        if (!$cek) {
            $this->db->table('mas_qr_location')->insert($data);
            return ['stts' => true, 'msg' => 'Proses berhasil...!'];
        } else {
            return ['stts' => false, 'msg' => 'Data ini sudah terdaftar...!'];
        }
    }

    public function updateQRlokasi($data, $id)
    {
        $cek =  $this->db->table('mas_qr_location')->where(['id' => $id])->update($data);
        if ($cek != false) {
            return ['stts' => true, 'msg' => 'Proses berhasil...!'];
        } else {
            return ['stts' => false, 'msg' => 'Data ini sudah terdaftar...!'];
        }
    }

    public function deleteQRlokasi($id)
    {
        $cek = $this->db->table('mas_qr_location')
            ->where(['id' => $id])
            ->get()->getRowArray();

        $this->db->table('mas_qr_location')->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!', 'name' => $cek['qr']];
    }

    public function getVisitor($stts)
    {
        if ($stts == 'all') {
            return $this->db->table('list_visitor')->orderBy("id", "ASC")->get()->getResultArray();
        } else {
            return $this->db->table('list_visitor')->where(['id_user' => $stts])->orderBy("id", "ASC")->get()->getResultArray();
        }
    }


    public function getIzin($stts, $date = null)
    {
        if ($stts == 'all') {
            return $this->db->table('mas_user_scan')->select('mas_user_scan.*, user_app.name')->join('user_app', 'user_app.id_bet = mas_user_scan.id_bet')->get()->getResultArray();
        } elseif ($date) {
            return $this->db->table('mas_user_scan')->select('mas_user_scan.*, user_app.name')->join('user_app', 'user_app.id_bet = mas_user_scan.id_bet')->where(['date' => $date])->get()->getResultArray();
        } else {
            return $this->db->table('mas_user_scan')->select('mas_user_scan.*, user_app.name')->join('user_app', 'user_app.id_bet = mas_user_scan.id_bet')->where(['id_user' => $stts])->get()->getResultArray();
        }
    }


    public function saveVisitor($data)
    {
        $cek = $this->db->table('list_visitor')
            ->where(['qr_code' => $data['qr_code']])
            ->get()->getRowArray();

        if (!$cek) {
            $this->db->table('list_visitor')->insert($data);
            return ['stts' => true, 'msg' => 'Proses berhasil...!'];
        } else {
            return ['stts' => false, 'msg' => 'Data ini sudah terdaftar...!'];
        }
    }

    public function deleteVisitor($id)
    {
        $cek = $this->db->table('list_visitor')
            ->where(['id' => $id])
            ->get()->getRowArray();
        $this->db->table('list_visitor')->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!', 'name' => $cek['qr_code']];
    }


    public function userPatrol($tgl, $bulan, $tahun, $id = null)
    {
        if ($id != null) {
            $data = $this->db->table('list_patrol')
                ->select('list_patrol.*, user_app.name, user_app.id_bet, user_app.no_phone')
                ->join('user_app', 'user_app.id = list_patrol.id_user')
                ->where("day(list_patrol.tgl) =$tgl AND month(list_patrol.tgl) = $bulan AND year(list_patrol.tgl)= $tahun AND list_patrol.id_user =$id")
                ->orderBy("user_app.id_bet")
                ->orderBy('list_patrol.id', 'ASC')
                ->get()->getResultArray();
        } else {
            $data = $this->db->table('list_patrol')
                ->select('list_patrol.*, user_app.name, user_app.id_bet, user_app.no_phone')
                ->join('user_app', 'user_app.id = list_patrol.id_user')
                ->where("day(list_patrol.tgl) =$tgl AND month(list_patrol.tgl) = $bulan AND year(list_patrol.tgl)= $tahun")
                ->orderBy("user_app.id_bet")
                ->orderBy('list_patrol.id', 'ASC')
                ->get()->getResultArray();
        }

        return $data;
    }

    public function userAll($tgl, $bulan, $tahun, $id = null)
    {


        if ($id == null) {
            $data = $this->db->table('mas_user_scan')->select('mas_user_scan.*, user_app.name, user_app.devisi')
                ->join('user_app', "user_app.id_bet = mas_user_scan.id_bet")
                ->where("day(mas_user_scan.date) =$tgl AND month(mas_user_scan.date) = $bulan AND year(mas_user_scan.date)= $tahun")
                ->get()->getResultArray();
        } else {
            $data = $this->db->table('mas_user_scan')->select('mas_user_scan.*, user_app.name, user_app.devisi')
                ->join('user_app', "user_app.id_bet = mas_user_scan.id_bet")
                ->where("day(mas_user_scan.date) =$tgl AND month(mas_user_scan.date) = $bulan AND year(mas_user_scan.date)= $tahun AND user_app.id =$id")
                ->get()->getResultArray();
        }
        return $data;
    }



    public function addUsers($data)
    {
        $dataUser = $this->db->table('user_app')->where('id_bet', $data['id_bet'])
            ->orWhere('email', $data['email'])
            ->orWhere('no_phone', $data['no_phone'])
            ->get()->getRowArray();
        if (!$dataUser) {
            $this->db->table('user_app')->insert($data);
            $pesan = [
                'stts' => true,
                'msg' => "data telah terdaftar...!",
            ];
        } elseif ($dataUser['id_bet'] == $data['id_bet']) {
            $pesan = [
                'stts' => false,
                'msg' => "data id bet sudah terdaftar...!",
            ];
        } elseif ($dataUser['email'] == $data['email']) {
            $pesan = [
                'stts' => false,
                'msg' => "data email sudah terdaftar...!",
            ];
        } elseif ($dataUser['no_phone'] == $data['no_phone']) {
            $pesan = [
                'stts' => false,
                'msg' => "data number phone sudah terdaftar...!",
            ];
        }
        return $pesan;
    }


    public function addAdminWeb($data)
    {
        $dataUser = $this->db->table('admin_web')->where('nik', $data['nik'])
            ->orWhere('username', $data['username'])
            ->get()->getRowArray();

        if (!$dataUser) {
            $this->db->table('admin_web')->insert($data);
            $pesan = [
                'stts' => true,
                'msg' => "data telah terdaftar...!",
            ];
        } elseif ($dataUser['nik'] == $data['nik']) {
            $pesan = [
                'stts' => false,
                'msg' => "data nik sudah terdaftar...!",
            ];
        } elseif ($dataUser['username'] == $data['username']) {
            $pesan = [
                'stts' => false,
                'msg' => "data username sudah terdaftar...!",
            ];
        }
        return $pesan;
    }

    public function getLateUser($user = 'all', $date = 'all')
    {
        $tgl = explode("-", $date);
        $tahun = $tgl[0];
        $bulan = $tgl[1];

        if ($user == 'all' && $date == 'all') {
            $data = $this->db->table('mas_late_user')->select("mas_late_user.*, user_app.name, mas_shift.shift, mas_shift.masuk, mas_shift.s_rest")
                ->join('mas_shift', 'mas_shift.id = mas_late_user.id_shift')->join('user_app', 'user_app.id_bet = mas_late_user.id_bet')
                ->get()->getResultArray();
        } elseif ($user && $date == 'all') {
            $data = $this->db->table('mas_late_user')->select("mas_late_user.*, user_app.name, mas_shift.shift, mas_shift.masuk, mas_shift.s_rest")
                ->join('mas_shift', 'mas_shift.id = mas_late_user.id_shift')->join('user_app', 'user_app.id_bet = mas_late_user.id_bet')
                ->where(['mas_late_user.id_bet' => $user])
                ->get()->getResultArray();
        } elseif ($user == 'all' && $date) {
            $data = $this->db->table('mas_late_user')->select("mas_late_user.*, user_app.name, mas_shift.shift, mas_shift.masuk, mas_shift.s_rest")
                ->join('mas_shift', 'mas_shift.id = mas_late_user.id_shift')->join('user_app', 'user_app.id_bet = mas_late_user.id_bet')
                ->where(" YEAR(mas_late_user.date) = '$tahun' AND MONTH(mas_late_user.date) ='$bulan'")
                ->get()->getResultArray();
        } elseif ($user && $date) {
            $data = $this->db->table('mas_late_user')->select("mas_late_user.*, user_app.name, mas_shift.shift, mas_shift.masuk, mas_shift.s_rest")
                ->join('mas_shift', 'mas_shift.id = mas_late_user.id_shift')->join('user_app', 'user_app.id_bet = mas_late_user.id_bet')
                ->where("mas_late_user.id_bet = '$user' AND YEAR(mas_late_user.date) = '$tahun' AND MONTH(mas_late_user.date) ='$bulan'")
                ->get()->getResultArray();
        }
        return $data;
    }


    public function getShift()
    {
        return $this->db->table('mas_shift')->get()->getResultArray();
    }

    public function addShift($data)
    {
        $this->db->table('mas_shift')->insert($data);
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function editShift($id, $data)
    {
        $this->db->table('mas_shift')->where(['id' => $id])->update($data);
        return ['stts' => true, 'msg' => 'Proses update berhasil...!'];
    }

    public function deleteShift($id)
    {
        $this->db->table('mas_shift')->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses update berhasil...!'];
    }


    public function getGagalfinger($user = 'all', $date = 'all')
    {
        $tgl = explode("-", $date);
        $tahun = $tgl[0];
        $bulan = $tgl[1];

        if ($user == 'all' && $date == 'all') {
            $data = $this->db->table('mas_failed_for_finger')->select("mas_failed_for_finger.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_failed_for_finger.id_bet')
                ->get()->getResultArray();
        } elseif ($user && $date == 'all') {
            $data = $this->db->table('mas_failed_for_finger')->select("mas_failed_for_finger.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_failed_for_finger.id_bet')
                ->where(['mas_failed_for_finger.id_bet' => $user])
                ->get()->getResultArray();
        } elseif ($user == 'all' && $date) {
            $data = $this->db->table('mas_failed_for_finger')->select("mas_failed_for_finger.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_failed_for_finger.id_bet')
                ->where(" YEAR(mas_failed_for_finger.date) = '$tahun' AND MONTH(mas_failed_for_finger.date) ='$bulan'")
                ->get()->getResultArray();
        } elseif ($user && $date) {
            $data = $this->db->table('mas_failed_for_finger')->select("mas_failed_for_finger.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_failed_for_finger.id_bet')
                ->where("mas_failed_for_finger.id_bet = '$user' AND YEAR(mas_failed_for_finger.date) = '$tahun' AND MONTH(mas_failed_for_finger.date) ='$bulan'")
                ->get()->getResultArray();
        }
        return $data;
    }

    public function updateUsers($id, $dataRegister)
    {
        $this->db->table('user_app')->where(['id' => $id])->update($dataRegister);
        return ['stts' => true, 'msg' => 'Proses update berhasil...!'];
    }

    public function getAbsenEtowa($user = 'all', $date = 'all')
    {
        if ($user == 'all' && $date == 'all') {
            $tgl = explode("-", date('Y-m'));
            $tahun = $tgl[0];
            $bulan = $tgl[1];
            $data = $this->db->table('mas_absen_etowa')->select("mas_absen_etowa.*, user_app.name")
                ->join('user_app', 'user_app.id_finger = mas_absen_etowa.id_bet')
                ->where(" YEAR(mas_absen_etowa.date) = '$tahun' AND MONTH(mas_absen_etowa.date) ='$bulan'")
                ->orderBy("mas_absen_etowa.id_bet")
                ->get()->getResultArray();
        } elseif ($user && $date == 'all') {
            $tgl = explode("-", date('Y-m'));
            $tahun = $tgl[0];
            $bulan = $tgl[1];
            $data = $this->db->table('mas_absen_etowa')->select("mas_absen_etowa.*, user_app.name")
                ->join('user_app', 'user_app.id_finger = mas_absen_etowa.id_bet')
                ->where("mas_absen_etowa.id_bet = '$user' AND YEAR(mas_absen_etowa.date) = '$tahun' AND MONTH(mas_absen_etowa.date) ='$bulan'")
                ->orderBy("mas_absen_etowa.id_bet")
                ->get()->getResultArray();
        } elseif ($user == 'all' && $date) {
            $tgl = explode("-", $date);
            $tahun = $tgl[0];
            $bulan = $tgl[1];
            $data = $this->db->table('mas_absen_etowa')->select("mas_absen_etowa.*, user_app.name")
                ->join('user_app', 'user_app.id_finger = mas_absen_etowa.id_bet')
                ->where(" YEAR(mas_absen_etowa.date) = '$tahun' AND MONTH(mas_absen_etowa.date) ='$bulan'")
                ->orderBy("mas_absen_etowa.id_bet")
                ->get()->getResultArray();
        } elseif ($user && $date) {
            $tgl = explode("-", $date);
            $tahun = $tgl[0];
            $bulan = $tgl[1];
            $data = $this->db->table('mas_absen_etowa')->select("mas_absen_etowa.*, user_app.name")
                ->join('user_app', 'user_app.id_finger = mas_absen_etowa.id_bet')
                ->where("mas_absen_etowa.id_bet = '$user' AND YEAR(mas_absen_etowa.date) = '$tahun' AND MONTH(mas_absen_etowa.date) ='$bulan'")

                ->get()->getResultArray();
        }
        return $data;
    }

    public function getAbsenEtowaFile($date)
    {


        $tgl = explode(" - ", $date);
        $dari = date('Y-m-d', strtotime($tgl[0]));
        $ke = date('Y-m-d', strtotime($tgl[1]));

        $data =
            $this->db->table('mas_absen_etowa')->select("mas_absen_etowa.*, user_app.name")
            ->join('user_app', 'user_app.id_finger = mas_absen_etowa.id_bet')
            ->where("(mas_absen_etowa.date BETWEEN CAST('$dari 00:00:00' AS DATETIME) AND CAST('$ke 23:59:59' AS DATETIME))  
                    OR (mas_absen_etowa.date BETWEEN CAST('$dari 00:00:00' AS DATETIME) AND CAST('$ke 23:59:59'AS DATETIME)) 
                    OR (mas_absen_etowa.date >= CAST('$dari 00:00:00'AS DATETIME) AND mas_absen_etowa.date <= CAST('$ke 23:59:59'AS DATETIME)) ")
            ->orderBy("mas_absen_etowa.id_bet")
            ->orderBy("mas_absen_etowa.date", 'ASC')
            ->get()->getResultArray();

        if ($data) {
            return ['stts' => true, 'msg' => 'data siap di download...!', 'data' => $data];
        } else {
            return ['stts' => false, 'msg' => 'data kosong...!'];
        }
    }


    public function getVisitorPrin($stts, $plan = null)
    {
        $tgl = explode(" - ", $stts);
        $dari = date('Y-m-d', strtotime($tgl[0]));
        $ke = date('Y-m-d', strtotime($tgl[1]));


        $list_data = [];

        $data =  $this->db->table('list_visitor')
            ->where(['list_visitor.id_user' => 'plan'])
            ->where("(list_visitor.jadwal BETWEEN CAST('$dari 00:00:00' AS DATETIME) AND CAST('$ke 23:59:59' AS DATETIME))")
            ->orWhere("(list_visitor.jadwal BETWEEN CAST('$dari 00:00:00' AS DATETIME) AND CAST('$ke 23:59:59'AS DATETIME))")
            ->orWhere("(list_visitor.jadwal >= CAST('$dari 00:00:00'AS DATETIME) AND list_visitor.jadwal <= CAST('$ke 23:59:59'AS DATETIME))")
            ->orderBy("id", "ASC")->get()->getResultArray();

        if ($plan == "all") {

            $list_data = $data;
        } else {
            foreach ($data as $d) {
                if ($plan) {
                    if ($d['id_user'] == $plan) {
                        array_push(
                            $list_data,
                            [
                                'id' => $d['id'],
                                'id_user' => $d['id_user'],
                                'nama' => $d['nama'],
                                'jadwal' => $d['jadwal'],
                                'bertemu' => $d['bertemu'],
                                'qr_code' => $d['qr_code'],
                                'keperluan' => $d['keperluan'],
                                'description' => $d['description'],
                                'masuk' => $d['masuk'],
                                'keluar' => $d['keluar'],
                                'create' => $d['create'],
                                'update' => $d['update']
                            ]
                        );
                    } else {
                        continue;
                    }
                } else {
                    array_push(
                        $list_data,
                        [
                            'id' => $d['id'],
                            'id_user' => $d['id_user'],
                            'nama' => $d['nama'],
                            'jadwal' => $d['jadwal'],
                            'bertemu' => $d['bertemu'],
                            'qr_code' => $d['qr_code'],
                            'keperluan' => $d['keperluan'],
                            'description' => $d['description'],
                            'masuk' => $d['masuk'],
                            'keluar' => $d['keluar'],
                            'create' => $d['create'],
                            'update' => $d['update']
                        ]
                    );
                }
            }
        }


        return $list_data;
    }


    public function addFormCekout($data)
    {
        $this->db->table("mas_cek_out")->insert($data);
        return ['stts' => true, 'msg' => 'data di simpan...!'];
    }

    public function getFormCekout($badge, $date)
    {

        if ($badge == "all" && $date == "all") {
            $data = $this->db->table("mas_cek_out")->select("mas_cek_out.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_cek_out.badge')->get()->getResultArray();
        } elseif ($badge && $date == "all") {
            $data = $this->db->table("mas_cek_out")->select("mas_cek_out.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_cek_out.badge')
                ->where(["badge" => $badge])->get()->getResultArray();
        } elseif ($badge == "all" && $date) {
            $date1 = explode("-", $date);
            $tahun = $date1[0];
            $bulan = $date1[1];
            $data = $this->db->table("mas_cek_out")->select("mas_cek_out.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_cek_out.badge')
                ->where(" YEAR(mas_cek_out.plan) = '$tahun' AND MONTH(mas_cek_out.plan) ='$bulan'")->get()->getResultArray();
        } elseif ($badge != "all" && $date != "all") {
            $date1 = explode("-", $date);
            $tahun = $date1[0];
            $bulan = $date1[1];
            $data =   $this->db->table("mas_cek_out")->select("mas_cek_out.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_cek_out.badge')
                ->where(["badge" => $badge])
                ->where(" YEAR(mas_cek_out.plan) = '$tahun' AND MONTH(mas_cek_out.plan) ='$bulan'")->get()->getResultArray();
        } else {
            $data = $this->db->table("mas_cek_out")->select("mas_cek_out.*, user_app.name")
                ->join('user_app', 'user_app.id_bet = mas_cek_out.badge')->get()->getResultArray();
        }

        return $data;
    }

    public function editFormCekout($id, $data)
    {
        $sesion = session()->get('data');

        $dataUser = $this->db->table("mas_cek_out")->where(['id' => $id])->get()->getRowArray();

        if ($dataUser['approved_by'] == null) {
            $this->db->table("mas_cek_out")->where(['id' => $id])->update($data);
            return ['stts' => true, 'msg' => 'berhasil di update...!'];
        } else {
            $data2 = [
                'approved_by' => null,
                'update' =>  $sesion['fullname'] . " " . date("Y-M-d h:i:s A")
            ];
            $this->db->table("mas_cek_out")->where(['id' => $id])->update($data2);
            return ['stts' => true, 'msg' => 'berhasil di update...!'];
        }
    }

    public function deleteFormCekout($id)
    {
        $this->db->table("mas_cek_out")->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'berhasil di delete...!'];
    }


    public function getVisitorPrint($id)
    {
        return $this->db->table('list_visitor')->where(['id' => $id])->get()->getRowArray();
    }
}
