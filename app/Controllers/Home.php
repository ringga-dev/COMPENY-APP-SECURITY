<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UndianModel;
use TCPDF;

class Home extends BaseController
{
    //fungsi untuk mendapatkan model dari agar bisa di pakai
    public function __construct()
    {
        $this->admin = new AdminModel();
        $this->undian = new UndianModel();
        $this->code = service('encrypter');
    }

    //tampilan awal setelah login
    public function index()
    {
        $data = [
            'title' => "Home"
        ];
        return view('conten/home/base_user', $data);
    }

    //fungsi edit user
    public function edit_profile()
    {
        $data = [
            'title' => "Home",
            'data' => session()->get('data')
        ];
        // dd(session()->get('data'));
        return view('conten/home/editprofile', $data);
    }

    //fungsi edit password user
    public function edit_password()
    {
        $data = [
            'title' => "Home",

        ];
        // dd(session()->get('data'));
        return view('conten/home/editpassword', $data);
    }

    //menampilkan lokasi qrcode untuk patroli
    public function qrcode()
    {
        $data = [
            'qr_location' => $this->admin->getQrLocation()
        ];
        return view('conten/print/print_qr_location', $data);
    }

    //save data ke pdf
    public function save_pdf()
    {
        $data = [
            'qr_location' => $this->admin->getQrLocation()
        ];

        $mpdf = new \Mpdf\Mpdf();
        $html = view('conten/print/pdf_qr_location', $data);

        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('QR_Code_location.pdf', 'I');
    }


    public function save_visitor_pdf()
    {
        $tgl = explode(" - ", $this->request->getVar('dateRekap'));
        $dari = date('Y-M-d', strtotime($tgl[0]));
        $ke = date('Y-M-d', strtotime($tgl[1]));
        $title = $this->request->getVar('title');
        $data = [
            'title' => "PT Etowa Packaging Indonesia",
            'date' => "$dari s.d $ke",
            'judul' => "$title",
            'visitor' => $this->admin->getVisitorPrin($this->request->getVar('dateRekap'), $this->request->getVar('stts')),
        ];

        $mpdf = new \Mpdf\Mpdf();
        $html = view('conten/print/pdf_qr_visitor', $data);

        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('QR_Code_location.pdf', 'D');
    }



    //halaman undian
    public function user_undia()
    {

        $data = [
            'title' => 'Managemen User',
            'user' => $this->undian->getUserUndia(),
        ];
        return view('conten/undian/user_udian', $data);
    }

    //menambah user undian
    public function add_user_undia()
    {
        $sesi = session()->get('data');
        $data1 = [
            'name' => $this->request->getVar('name'),
            'bet_id' => $this->request->getVar('bet_id'),
            'hadiah' => 0,
            'create' => date("d-M-Y h:i:s A") . " by " .  $sesi['username'],
        ];
        // dd($data1);
        $data = $this->undian->addUser($data1);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_undia');
    }

    //delete user undian
    public function delete_user($id)
    {
        $data = $this->undian->deleteUser($id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_undia');
    }

    //menampilkan hadiah undian
    public function user_hadia()
    {

        $data = [
            'title' => 'Managemen Hadiah',
            'user' => $this->undian->getHadiaUndia(),
        ];
        return view('conten/undian/hadiah_undian', $data);
    }

    //menambah data hadiah undian
    public function add_hadiah()
    {
        $sesi = session()->get('data');
        $data1 = [
            'barang' => $this->request->getVar('barang'),
            'create' => date("d-M-Y h:i:s A") . " by " .  $sesi['username'],
        ];

        $data = $this->undian->addHadiah($data1);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_hadia');
    }

    //delet hadiah undian
    public function delete_hadia($id)
    {
        $data = $this->undian->deleteHadiah($id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_hadia');
    }

    //melakukan pengundian
    public function hexsa()
    {
        $data = [];
        for ($i = 0; $i < 500; $i++) {
            $data = $this->undian->getUserWin();
        }
        echo json_encode($data);
    }

    //melakukan penerimaan hadiah oleh user
    public function terima_hadia()
    {
        $user = explode(" : ", $this->request->getVar('id_user'));
        $barang = explode(" : ", $this->request->getVar('id_hadia'));

        // echo json_encode($user[1] + $barang[1]);
        $data = $this->undian->terimaHadia($user[1], $barang[1]);
        // wah($user[1]);
        echo json_encode($data);
    }

    //hadiah yang di dapat user
    public function user_mendapat()
    {
        $data = [
            'title' => 'Managemen Hadiah',
            'user' => $this->undian->getUserMenang(),
        ];
        return view('conten/undian/user_win', $data);
    }
    //scan user hadir
    public function user_scan()
    {
        $data = [
            'title' => 'Managemen Hadiah',
            'user' => $this->undian->getUserScan(),
        ];
        return view('conten/undian/user_scan', $data);
    }

    // hapus data scan kehadiran user
    public function deleteScan($id)
    {
        $data = $this->undian->deleteScanUser($id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_scan');
    }

    // riset scan user 
    public function deleteScanAll()
    {
        $data = $this->undian->deleteScanUserAll();
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_scan');
    }

    public function delete_userAll()
    {
        $data = $this->undian->deleteUserAll();
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/home/user_undia');
    }
}
