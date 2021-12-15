<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        return view('auth/login');
    }


    public function user_auth()
    {
        $stts = $this->request->getVar('stts');
        if ($stts == "login") {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = $this->authModel->getUser($username, $password);

            if ($data['stts'] == false) {
                session()->setFlashdata('pesan', $data);
                return redirect()->to('/auth');
            } else {
                $data_session = [
                    'data'  => $data['data'],
                    'role'     => $data['data']['position'],
                    'logged_in' => TRUE
                ];
                session()->set($data_session);

                session()->setFlashdata('pesan', $data);
                return redirect()->to('/home');
            }
        } elseif ($stts == "register") {
            $password = $this->request->getPost('password');
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $data = [
                'nik' => $this->request->getVar('nik'),
                'username' => $this->request->getVar('username'),
                'fullname' => $this->request->getVar('fullname'),
                'password' => $password_hash,
                'position' => 'admin',
                'enable_login' => 1,
                'create' => date("d-M-Y h:i:s A"),
            ];

            $cek = $this->authModel->addUser($data);
            // dd($cek);
            if ($cek['stts'] == false) {
                session()->setFlashdata('pesan', $cek);
                return redirect()->to('/auth/register');
            } else {
                session()->setFlashdata('pesan', $cek);
                return redirect()->to('/auth');
            }
        }
    }

    public function register()
    {
        return view('auth/register');
    }


    public function logout()
    {
        //view loding web 
        $data['loding_text'] = 'silahkan tunggu';
        // echo view('auth/loding', $data);

        session()->remove('data');
        session()->remove('role');
        session()->remove('logged_in');
        $data = ['stts' => true, 'msg' => 'Proses logout berhasil...!'];
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/auth');
    }
}
