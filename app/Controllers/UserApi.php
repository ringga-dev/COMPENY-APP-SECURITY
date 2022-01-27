<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RestApiModel;
use CodeIgniter\HTTP\Response;

class UserApi extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->model = new RestApiModel();
        helper(['api', 'form', 'security']);
    }


    public function userada_ya()
    {
        return $this->respond("dada fafaf afefef", 200);
    }

    public function regiter_api()
    {
        $password = $this->request->getPost('password');
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $dataRegister = [
            'name' => $this->request->getPost('name'),
            'id_bet' => $this->request->getPost('id_bet'),
            'email' => $this->request->getPost('email'),
            'no_phone' => $this->request->getPost('no_phone'),
            'devisi' => 'security',
            'password' => $password_hash,
            'image' => 'user.jpg',
            'created' => date("Y-M-d h:i:s A"),
            'created_by' => 'null',
        ];

        $data = $this->model->addUsers($dataRegister);

        return $this->respond($data, 200);
    }

    public function login_api()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = $this->model->loginUsers($email, $password);

        return $this->respond($data, 200);
    }


    public function login_bet()
    {
        $bet = $this->request->getPost('id_bet');
        $data = $this->model->loginScan($bet);
        return $this->respond($data, 200);
    }

    public function list_patrol()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $filter = $this->request->getPost('tgl') ? $this->request->getPost('tgl') : date('d-m-Y');
        $date =  explode("-", $filter);
        $data = $this->model->getHistory($token, $id, $date[0], $date[1], $date[2]);
        return $this->respond($data, 200);
    }

    public function location_scan_qr()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $log = $this->request->getPost('lot');
        $data = $this->model->list_location($token, $id, $log);

        return $this->respond($data, 200);
    }

    public function addpatrol()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');

        $data = [
            'id_user' => $id,
            'qr_code' => $this->request->getPost('qr_code'),
            'tgl' => $this->request->getPost('date'),
            'create' =>  date('Y-m-d H:i:s')
        ];

        $data = $this->model->add_patrol($token, $id, $data);

        return $this->respond($data, 200);
    }

    public function scanvisitor()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $qr_code = $this->request->getPost('qr_code');
        $stts = $this->request->getPost('stts');


        $data = $this->model->scan_visitor($token, $id, $qr_code, $stts);

        return $this->respond($data, 200);
    }

    public function listvisitor()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $tgl = $this->request->getPost('tgl');
        $stts = $this->request->getPost('stts');
        $data = $this->model->list_visitor($token, $id, $stts, $tgl);

        return $this->respond($data, 200);
    }


    public function cek_token()
    {
        $token = $this->request->getVar('token');
        $data = $this->model->cekTokenUser($token);
        return $this->respond($data, 200);
    }

    public function user_izin()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $bet = $this->request->getPost('bet');
        $remarks = $this->request->getPost('remarks');
        $dari = $this->request->getPost('dari');
        $menuju = $this->request->getPost('menuju');
        $stts = $this->request->getPost('stts');

        $data = $this->model->cek_izin($token, $id, $bet, $remarks, $stts, $dari, $menuju);

        return $this->respond($data, 200);
    }

    public function edit_pass()
    {
        $old_pass = $this->request->getPost('old_pass');
        $new_pass = $this->request->getPost('new_pass');
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');

        $data = $this->model->editPassword($token, $id, $old_pass, $new_pass);

        return $this->respond($data, 200);
    }

    public function location_user()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $lat = $this->request->getPost('lat');
        $long = $this->request->getPost('long');
        $this->model->userLocation($token, $id, $lat, $long);
    }

    public function shift()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $data = $this->model->getShift($token, $id);

        return $this->respond($data, 200);
    }

    public function user_late()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $id_bet = $this->request->getPost('id_bet');
        $id_shift = $this->request->getPost('id_shift');
        $stts = $this->request->getPost('stts');
        $alasan = $this->request->getPost('alasan');
        $data = $this->model->userLate($token, $id, $id_bet, $id_shift, $stts, $alasan);
        return $this->respond($data, 200);
    }


    public function devisi()
    {
        return $this->respond($this->model->getDevisi(), 200);
    }

    public function late_user()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $data = $this->model->getLateUser($token, $id, $this->request->getPost('id_bet') ? $this->request->getPost('id_bet') : "all", $this->request->getPost('date') ? $this->request->getPost('date') : date('Y-m-d'));

        return $this->respond($data, 200);
    }

    public function absen()
    {
        $bet = $this->request->getPost('bet');
        $data = $this->model->absenUndia($bet);
        return $this->respond($data, 200);
    }


    public function cek_user()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');
        $id_bet = $this->request->getPost('id_bet');
        $data = $this->model->cekUserApp($token, $id, $id_bet);
        return $this->respond($data, 200);
    }


    public function gagal_finger_user()
    {
        $token = $this->request->getPost('token');
        $id = $this->request->getPost('id');

        $send = [
            'id_bet' => $this->request->getPost('id_bet'),
            'stts' => $this->request->getPost('stts'),
            'keterangan' => $this->request->getPost('alasan'),
            'date' => date('Y-m-d H:i:s')
        ];
        $data = $this->model->saveDataGagalFinger($token, $id, $send);
        return $this->respond($data, 200);
    }





    public function upload_image()
    {
        if ($this->validate([
            'image' => [
                'rules'  => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => '{field} file kamu bukan gambar ...',
                    'mime_in' => '{field} file kamu bukan gambar...'
                ]
            ]
        ])) {
            $image = $this->request->getFile('image');


            $path = './assets/image/profile/';
            $gambar = service('image');


            if ($image != null) {
                $nameFile = $image->getRandomName();
                $image->move($path, $nameFile);

                $gambar->withFile($path . '/' . $nameFile)
                    ->save($path . "/" . $nameFile);
                $data = $this->model->updateImage(
                    $this->request->getPost('id'),
                    $nameFile
                );
                return $this->respond($data, 200);
            } else {
                $pesan = [
                    'stts' => false,
                    'msg' => "OPS..!, \n Foto Masih Kosong...!",
                ];
                return $this->respond($pesan, 200);
            }
        } else {
            $errors = \Config\Services::validation();
            $err = $errors->getError('image');
            $pesan = [
                'stts' => false,
                'msg' => "OPS..!, \n $err...!",
            ];
            return $this->respond($pesan, 200);
        }
    }


    public function absen_etowa()
    {
        $bet = $this->request->getPost('bet');
        $data = $this->model->absenEtowa($bet);
        return $this->respond($data, 200);
    }

    public function cek_user_izin()
    {
        $stts = $this->request->getPost('stts');
        $data = $this->model->cekDownCekOut($stts);

        return $this->respond($data, 200);
    }

    public function get_cek_out()
    {
        $stts = $this->request->getPost('stts');
        $data = $this->model->getCekOut($stts);
        return $this->respond($data, 200);
    }

    public function set_approve()
    {

        $name = $this->request->getPost('name');
        $id = $this->request->getVar('id');
        $data = "$name " . " " . date("Y-M-d h:i:s A");


        $data = $this->model->editFormCekout($id, $data);
        // dd($pesan);
        return $this->respond($data, 200);
    }

    /**Ajak funtion */

    public function ajax_form_cekout()
    {
        $badge = $this->request->getVar('badge');
        $stts = $this->request->getVar('stts');

        $pesan = $this->model->cekOutUser($badge, $stts);

        echo json_encode($pesan);
    }

    public function ajax_is_active_form()
    {
        $id = $this->request->getVar('id');
        $pesan = $this->model->editFormIsActive($id);

        echo json_encode($pesan);
    }


    public function ajax_user_izin()
    {
        $bet = $this->request->getPost('bet');
        $remarks = $this->request->getPost('remarks');
        $dari = $this->request->getPost('dari');
        $menuju = $this->request->getPost('menuju');
        $stts = $this->request->getPost('stts');

        $data = $this->model->ajaxCekIzin($bet, $remarks, $stts, $dari, $menuju);

        return $this->respond($data, 200);
    }




    public function ajax_scan_visitor()
    {

        $qr_code = $this->request->getPost('qr_code');
        $stts = $this->request->getPost('stts');


        $data = $this->model->ajaxScanVisitor($qr_code, $stts);

        return $this->respond($data, 200);
    }
    /**end Ajak funtion */
}
