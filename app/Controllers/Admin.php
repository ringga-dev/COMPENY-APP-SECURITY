<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AdminModel;
use chillerlan\QRCode\Data\Byte;
//library excel
use CodeIgniter\HTTP\RequestInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//library qrcode
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Imagick;
use Mpdf\Gif\Image;

class Admin extends BaseController
{

    //memangil model dan session 
    public function __construct()
    {
        $this->admin = new AdminModel();
        $this->sesi = session()->get('data');
    }


    public function menu()
    {
        //
    }

    //menampilkan user
    public function user()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User',
            'user' => $this->admin->getUser(),
        ];
        return view('conten/home/user', $data);
    }

    //add user
    public function add_user()
    {

        $password = 123456;
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sesi = session()->get('data');
        $dataRegister = [
            'nik' => $this->request->getPost('nik'),
            'username' => $this->request->getPost('username'),
            'password' => $password_hash,
            'fullname' => $this->request->getPost('fullname'),
            'position' => $this->request->getPost('position'),
            'enable_login' => 0,
            'create' => $sesi['username'] . " " . date("Y-M-d h:i:s A"),
        ];

        $data = $this->admin->addAdminWeb($dataRegister);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user');
    }

    //delete user
    public function deleteUser($id)
    {

        $data = $this->admin->hapusUser($id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user');
    }
    //blok akses user
    public function blok_akses()
    {

        $id = $this->request->getVar('nik');

        $data = $this->admin->aksesBlok($id);
        return json_encode($data);
    }

    public function blok_akses_userapp()
    {

        $id = $this->request->getVar('id');

        $data = $this->admin->aksesBlok_userApp($id);
        return json_encode($data);
    }
    public function blok_akses_userapp_hod()
    {

        $id = $this->request->getVar('id');

        $data = $this->admin->aksesBlok_userAppHod($id);
        return json_encode($data);
    }
    // menampilkan user aplikasi
    public function user_app()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User App',
            'user' => $this->admin->getUserApp(),
        ];
        return view('conten/home/userApp', $data);
    }
    // delet user aplikasi
    public function deleteUserApp($id)
    {

        $data = $this->admin->hapusUserApp($id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_app');
    }

    //menampilkan lokasi qr
    public function qr_location()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User App',
            'qr_location' => $this->admin->getQrLocation(),
        ];
        return view('conten/home/qr_location', $data);
    }

    // menambah qr baru
    public function add_qr_loc()
    {
        $sesi = session()->get('data');
        $data1 = [
            'qr' => trim($this->request->getVar('gr_code')),
            'stts' => $this->request->getVar('stts'),
            'lot' => $this->request->getVar('lokasi'),
            'dec' => str_replace("\n", "<br />", $this->request->getVar('dec')),
            'create' => date("d-M-Y h:i:s A") . " by " .  $sesi['username'],
            // 'log' => $this->request->getVar('long') . ", " . $this->request->getVar('lat')
        ];

        //membuat image gambar
        $data = $this->admin->saveQRlokasi($data1);
        if ($data['stts'] == true) {
            $writer = new PngWriter();

            // Create QR code
            $qrCode = QrCode::create(trim($this->request->getVar('gr_code')))
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);
            echo $result->getString();

            // Save it to a file
            $nama = trim($this->request->getVar('gr_code'));
            $result->saveToFile("assets/image/qr/$nama.png");
        }
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/qr_location');
    }

    // edit qr
    public function edit_qr($id)
    {
        $sesi = session()->get('data');
        $data1 = [
            'stts' => $this->request->getVar('stts'),
            'lot' => $this->request->getVar('lokasi'),
            'dec' => $this->request->getVar('dec'),
            'update' => date("d-M-Y h:i:s A")  . " By " .  $sesi['username'],
            // 'log' => $this->request->getVar('long') . ", " . $this->request->getVar('lat')
        ];

        $data = $this->admin->updateQRlokasi($data1, $id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/qr_location');
    }

    // delete qr
    public function deleteQR($id)
    {
        $data = $this->admin->deleteQRlokasi($id);
        if ($data['stts'] == true) {
            $path = './assets/image/qr/' . $data['name'] . '.png';
            chmod(
                $path,
                0777
            );
            unlink($path);
        }
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/qr_location');
    }

    // menampilkan visitor
    public function visitor()
    {
        $data = [
            'title' => 'Managemen User App',
            'visitor' => $this->admin->getVisitor($this->request->getVar('filter') ? $this->request->getVar('filter') : "all"),
        ];
        // dd($this->request->getVar('filter'));
        return view('conten/home/visitor', $data);
    }
    // menambah visitor
    public function add_visitor()
    {
        $sesi = session()->get('data');

        $bytes = substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 20);
        $data = [
            'nama' => $this->request->getVar('name'),
            'jadwal' => $this->request->getVar('date') . " " . $this->request->getVar('time'),
            'qr_code' => trim($bytes),
            'keperluan' => $this->request->getVar('keperluan'),
            'bertemu' => $this->request->getVar('bertemu'),
            'description' => $this->request->getVar('description'),
            'id_user' => 'plan',
            'create' => date("d-M-Y h:i:s A") . " By " .  $sesi['username'],
        ];

        $data = $this->admin->saveVisitor($data);
        if ($data['stts'] == true) {
            $writer = new PngWriter();

            // Create QR code
            $qrCode = QrCode::create(trim($bytes))
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);
            echo $result->getString();

            // Save it to a file
            $nama = trim($bytes);
            $result->saveToFile("assets/image/qr_visitor/$nama.png");
        }

        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/visitor');
    }

    // delete visitor
    public function deleteVisitor($id)
    {
        $data = $this->admin->deleteVisitor($id);

        if ($data['stts'] == true) {
            $path = './assets/image/qr_visitor/' . $data['name'] . '.png';
            chmod(
                $path,
                0777
            );
            unlink($path);
        }
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/visitor');
    }

    // data patroli
    public function history_patrol()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $filter = $this->request->getVar('filter') ? $this->request->getVar('filter') : date('Y-m-d');
        $date =  explode("-", $filter);

        $data = [
            'title' => 'Managemen User App',
            'datascan' => $this->admin->userPatrol($date[2], $date[1], $date[0], $this->request->getVar('id')),
            'user' => $this->admin->getUserSecurity(),
        ];

        return view('conten/home/user_patrol', $data);
    }

    // data visitor
    public function history_fisitor()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User App',
            'visitor' => $this->admin->listVisitor($this->request->getVar('id')),
        ];
        return view('conten/home/user_patrol', $data);
    }

    //semua user
    public function all_users()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }

        $filter = $this->request->getVar('filter') ? $this->request->getVar('filter') : date('Y-m-d');
        $date =  explode("-", $filter);
        $data = [
            'title' => 'Managemen User App',
            'scan' => $this->admin->userAll($date[2], $date[1], $date[0], $this->request->getVar('id')),
            'user' => $this->admin->getUserApp(),
        ];
        // dd($data);
        return view('conten/home/user_scan', $data);
    }

    //menambah user
    public function action_user()
    {
        $password = 123456;
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sesi = session()->get('data');
        $dataRegister = [
            'name' => $this->request->getPost('name'),
            'id_bet' => $this->request->getPost('id_bet'),
            'id_finger' => $this->request->getPost('id_finger'),
            'email' => $this->request->getPost('email'),
            'no_phone' => $this->request->getPost('no_phone'),
            'devisi' => $this->request->getPost('devisi'),
            'section' => $this->request->getPost('section'),
            'password' => $password_hash,
            'image' => 'user.jpg',
            'enable_login' => 0,
            'enable_hod_app' => 0,
            'created' => date("Y-M-d h:i:s A"),
            'created_by' => $sesi['username'],
        ];

        $data = $this->admin->addUsers($dataRegister);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_app');
    }

    public function edit_userApp($id)
    {

        $sesi = session()->get('data');
        $dataRegister = [
            'name' => $this->request->getPost('name'),
            'id_bet' => $this->request->getPost('id_bet'),
            'id_finger' => $this->request->getPost('id_finger'),
            'email' => $this->request->getPost('email'),
            'no_phone' => $this->request->getPost('no_phone'),
            'devisi' => $this->request->getPost('devisi'),
            'section' => $this->request->getPost('section'),
            'update_by' =>  date("Y-M-d h:i:s A") . " By " . $sesi['username'],
        ];

        $data = $this->admin->updateUsers($id, $dataRegister);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_app');
    }

    public function user_location()
    {
        $data = [
            'title' => 'Managemen User App',
            'user' => $this->admin->getUserApp(),
        ];
        return view('conten/home/userApp', $data);
    }

    public function izin()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User App',
            'visitor' => $this->admin->getIzin($this->request->getVar('filter') ? $this->request->getVar('filter') : "all", $this->request->getVar('date')),
        ];
        return view('conten/home/user_izin', $data);
    }

    public function late_user()
    {
        $data = [
            'title' => 'Managemen User App',
            'visitor' => $this->admin->getLateUser($this->request->getVar('user') ? $this->request->getVar('user') : "all", $this->request->getVar('filter') ? $this->request->getVar('filter') : date('Y-m')),
            'user' => $this->admin->getUserApp(),
        ];
        // dd($data);
        return view('conten/home/user_late', $data);
    }

    public function shift()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User App',
            'visitor' => $this->admin->getShift(),
        ];
        return view('conten/home/shift', $data);
    }

    public function add_shift()
    {
        $sesi = session()->get('data');
        $data = [
            'shift' => $this->request->getVar('shift'),
            'masuk' => $this->request->getVar('in'),
            'keluar' => $this->request->getVar('out'),
            'm_rest' => $this->request->getVar('m_rest'),
            's_rest' => $this->request->getVar('s_rest'),
            'create' => date("Y-M-d h:i:s A") . " by " . $sesi['username']
        ];

        $data = $this->admin->addShift($data);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/shift');
    }

    public function edit_shift($id)
    {
        $sesi = session()->get('data');
        $data = [
            'shift' => $this->request->getVar('shift'),
            'masuk' => $this->request->getVar('in'),
            'keluar' => $this->request->getVar('out'),
            'm_rest' => $this->request->getVar('m_rest'),
            's_rest' => $this->request->getVar('s_rest'),
            'update' => date("Y-M-d h:i:s A") . " by " . $sesi['username']
        ];
        $data = $this->admin->editShift($id, $data);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/shift');
    }

    public function delete_shift($id)
    {
        $data = $this->admin->deleteShift($id);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/shift');
    }



    public function simpanExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $x => $row) {
            if ($x == 0 or $x == 1) {
                continue;
            }

            $password = 123456;
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $sesi = session()->get('data');
            $dataRegister = [
                'name' => $row[1],
                'id_bet' => $row[2],
                'id_finger' => $row[6],
                'email' => $row[3],
                'no_phone' => $row[4],
                'devisi' => $row[5],
                'section' => $row[7],
                'password' => $password_hash,
                'image' => 'user.jpg',
                'enable_login' => 0,
                'created' => date("Y-M-d h:i:s A"),
                'created_by' => $sesi['username'],
            ];

            $data = $this->admin->addUsers($dataRegister);
        }
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_app');
    }


    public function failed_for_finger()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User Gagal Finger',
            'visitor' => $this->admin->getGagalfinger($this->request->getVar('users') != null ? $this->request->getVar('users') : "all", $this->request->getVar('filter') ? $this->request->getVar('filter') : date('Y-m')),
            'user' => $this->admin->getUserApp(),
        ];

        return view('conten/home/gagal_finger', $data);
    }



    public function absen_user_etowa()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User Gagal Finger',
            'absen' => $this->admin->getAbsenEtowa($this->request->getVar('users') ? $this->request->getVar('users') : "all", $this->request->getVar('filter') ? $this->request->getVar('filter') : "all"),
            'user' => $this->admin->getUserApp(),

        ];
        // dd($data);

        return view('conten/home/absen_user_etowa', $data);
    }
    public function absen_user_harian()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }

        // $bil = 124; // Inisialisasi variabel bil dengan nilai 10

        // if ($bil % 2 == 0) { //Kondisi
        //     echo "$bil Merupakan Bilangan Genap"; //Kondisi true
        // } else {
        //     echo "$bil Merupakan Bilangan Ganjil"; //Kondisi false
        // }

        // $kalender = CAL_GREGORIAN;
        // $bulan = date("m");
        // $tahun = date("Y");
        // echo cal_days_in_month($kalender, $bulan, $tahun);
        $data = [
            'title' => 'Managemen User Gagal Finger',
            'absen' => $this->admin->getAbsenHarian($this->request->getVar('users') ? $this->request->getVar('users') : "all", $this->request->getVar('filter') ? $this->request->getVar('filter') : "all"),
            'user' => $this->admin->getUserAppHarian(),

        ];
        // dd($data);

        return view('conten/home/absen_user_harian', $data);
    }


    public function report_absen()
    {
        $tgl = explode(" - ", $this->request->getVar('date'));
        $dari = date('d - ', strtotime($tgl[0]));
        $ke = date('d M y', strtotime($tgl[1]));

        // dd($this->request->getVar('date'));
        $log =  "assets/backup/" . "data.txt";
        $newfile = 'assets/backup/' . $dari . $ke . ".txt";
        copy($log, $newfile);
        $data = $this->admin->getAbsenEtowaFile($this->request->getVar('date') ? $this->request->getVar('date') : "all");
        if ($data['stts'] == false) {
            session()->setFlashdata('pesan', $data);
            return redirect()->to('/admin/absen_user_etowa');
        } else {
            // dd($data);
            $text = "";
            foreach ($data['data'] as $d) {
                $date = date('d/m/Y H:i:s', strtotime($d["date"]));
                $text = $text . $d['id_bet'] . "\t" . "1" . "\t" . $date . "\t\n";
            }
            file_put_contents(
                $newfile,
                $text
            );

            if (file_exists($newfile)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($newfile));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: private');
                header('Pragma: private');
                header('Content-Length: ' . filesize($newfile));
                ob_clean();
                flush();
                readfile($newfile);

                exit;
            } else {
                $_SESSION['pesan'] = "Oops! File - $dari$ke.txt - not found ...";
                header("location:index.php");
            }

            session()->setFlashdata('pesan', $data);
            return redirect()->to('/admin/absen_user_etowa');
        }
    }

    public function cek_out()
    {
        $badge = !$this->request->getVar('id_badge') ? "all" : $this->request->getVar('id_badge');
        $date = !$this->request->getVar('filter') ? "all" : $this->request->getVar('filter');


        // dd("$badge, $date");
        $data = [
            'title' => 'Managemen User App',
            'visitor' =>  $this->admin->getFormCekout($badge, $date),
            'user' => $this->admin->getUserApp(),
        ];
        // dd($data);
        return view('conten/home/cek_out', $data);
    }

    //devisi
    public function devisi()
    {

        $data = [
            'title' => 'Managemen Devisi',
            'visitor' =>  $this->admin->getDevisi(),
        ];
        // dd($data);
        return view('conten/home/devisi', $data);
    }

    public function add_devisi()
    {
        $devisi = $this->request->getVar('privilege_name');
        $pesan = $this->admin->addDevisi($devisi);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/devisi');
    }

    public function edit_devisi($id)
    {
        $devisi = $this->request->getVar('privilege_name');
        $pesan = $this->admin->editDevisi($id, $devisi);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/devisi');
    }

    public function delete_devisi($id)
    {
        $pesan = $this->admin->deleteDevisi($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/devisi');
    }


    public function add_form_cekout()
    {
        $data = [
            'badge' => $this->request->getVar('badge'),
            'plan' => $this->request->getVar('planDate') . " " . $this->request->getVar('planTime'),
            'end_time' => $this->request->getVar('end_time'),
            'destination' => $this->request->getVar('destination'),
            'remarks' => $this->request->getVar('remarks'),
            'stts_form' => $this->request->getVar('stts_form'),
            'from' => $this->request->getVar('from'),
            'to' => $this->request->getVar('to'),
            'approved_by' => $this->request->getVar('approved_by'),
            'create' => date("Y-M-d h:i:s A"),

        ];

        $pesan = $this->admin->addFormCekout($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/cek_out');
    }

    public function approve()
    {

        $sesion = session()->get('data');
        $id = $this->request->getVar('id');
        $data = [
            'approved_by' => $sesion['fullname'] . " " . date("Y-M-d h:i:s A"),
            'update' =>  $sesion['fullname'] . " " . date("Y-M-d h:i:s A")
        ];

        $pesan = $this->admin->editFormCekout($id, $data);
        // dd($pesan);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/cek_out');
    }

    public function delete_form_cekout()
    {
        $id = $this->request->getVar('id');

        $pesan = $this->admin->deleteFormCekout($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/cek_out');
    }

    public function edit_form_cekout()
    {
        $sesion = session()->get('data');
        $id = $this->request->getVar('id');
        $data = [
            'plan' => $this->request->getVar('planDate') . " " . $this->request->getVar('planTime'),
            'end_time' => $this->request->getVar('end_time'),
            'destination' => $this->request->getVar('destination'),
            'remarks' => $this->request->getVar('remarks'),
            'stts_form' => $this->request->getVar('stts_form'),
            'from' => $this->request->getVar('from'),
            'to' => $this->request->getVar('to'),
            'update' =>  $sesion['fullname'] . " " . date("Y-M-d h:i:s A")
        ];
        $pesan = $this->admin->editFormCekout($id, $data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/cek_out');
    }


    public function generate_badge()
    {
        if ($this->request->getVar('action') == 'visitor') {

            $id = $this->request->getVar('id');
            $data = $this->admin->getVisitorPrint($id);

            // dd($data);
            return view("conten/print/output_card_visitor", $data);
        } elseif ($this->request->getVar('action') == 'userApp') {
            $badge = $this->request->getVar('badge');
            $name = $this->request->getVar('name');

            $writer = new PngWriter();

            // Create QR code
            $qrCode = QrCode::create(trim($badge))
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);

            // Save it to a file
            $nama = trim($name);
            $result->saveToFile("assets/image/gr-user/$nama.png");
            $data = ['file' => "assets/image/gr-user/$nama.png", 'badge' => $badge, 'name' => $this->request->getVar('name')];

            return view("conten/print/output_card", $data);
            $path = "assets/image/gr-user/$nama.png";


            chmod(
                $path,
                0777
            );
            unlink($path);
        } else {
            session()->setFlashdata('pesan', ['stts' => false, 'msg' => 'Opss terjadi kesalahan pada file...!']);
            return redirect()->to('/home');
        }
    }


    public function generate_badge_harian()
    {
        if ($this->request->getVar('action') == 'visitor') {

            $id = $this->request->getVar('id');
            $data = $this->admin->getVisitorPrint($id);

            // dd($data);
            return view("conten/print/output_card_visitor", $data);
        } elseif ($this->request->getVar('action') == 'userApp') {
            $badge = $this->request->getVar('badge');
            $name = $this->request->getVar('name');

            $writer = new PngWriter();

            // Create QR code
            $qrCode = QrCode::create(trim($badge))
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);

            // Save it to a file
            $nama = trim($name);
            $result->saveToFile("assets/image/gr-user/$nama.png");
            $data = ['file' => "assets/image/gr-user/$nama.png", 'badge' => $badge, 'name' => $this->request->getVar('name')];

            return view("conten/print/output_card_harian", $data);
            $path = "assets/image/gr-user/$nama.png";


            chmod(
                $path,
                0777
            );
            unlink($path);
        } else {
            session()->setFlashdata('pesan', ['stts' => false, 'msg' => 'Opss terjadi kesalahan pada file...!']);
            return redirect()->to('/home');
        }
    }


    public function user_harian()
    {
        $role = session()->get('role');
        if ($role != "admin") {
            return redirect()->to('/home');
        }
        $data = [
            'title' => 'Managemen User App',
            'user' => $this->admin->getUserAppHarian(),
        ];
        return view('conten/home/userHarian', $data);
    }
    //menambah user
    public function action_user_harian()
    {
        $password = 123456;
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sesi = session()->get('data');
        $dataRegister = [
            'name' => $this->request->getPost('name'),
            'id_bet' => $this->request->getPost('id_bet'),
            'id_finger' => $this->request->getPost('id_bet'),
            'email' => $this->request->getPost('email'),
            'no_phone' => $this->request->getPost('no_phone'),
            'devisi' => $this->request->getPost('devisi'),
            'section' => $this->request->getPost('section'),
            'password' => $password_hash,
            'image' => 'user.jpg',
            'enable_login' => 0,
            'enable_hod_app' => 0,
            'stts_kerja' => 'HL',
            'created' => date("Y-M-d h:i:s A"),
            'created_by' => $sesi['username'],
        ];

        $data = $this->admin->addUsers($dataRegister);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_harian');
    }

    public function edit_userAppHarian($id)
    {
        $sesi = session()->get('data');
        $dataRegister = [
            'name' => $this->request->getPost('name'),
            'id_bet' => $this->request->getPost('id_bet'),
            'id_bet' => $this->request->getPost('id_bet'),
            'email' => $this->request->getPost('email'),
            'no_phone' => $this->request->getPost('no_phone'),
            'devisi' => $this->request->getPost('devisi'),
            'section' => $this->request->getPost('section'),
            'update_by' =>  date("Y-M-d h:i:s A") . " By " . $sesi['username'],
        ];

        $data = $this->admin->updateUsers($id, $dataRegister);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_harian');
    }

    public function bpjs_user($badge)
    {
        $nominal = $this->request->getVar('nominal');
        $data = $this->admin->updateBpjs($badge, $nominal);
        session()->setFlashdata('pesan', $data);
        return redirect()->to('/admin/user_harian');
    }


    //section

    public function section()
    {

        $data = [
            'title' => 'Managemen Section',
            'visitor' =>  $this->admin->getSection(),
        ];
        // dd($data);
        return view('conten/home/section', $data);
    }

    public function add_section()
    {
        $devisi = $this->request->getVar('section');
        $pesan = $this->admin->addSection($devisi);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/section');
    }

    public function edit_section($id)
    {
        $devisi = $this->request->getVar('section');
        $pesan = $this->admin->editSection($id, $devisi);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/section');
    }

    public function delete_section($id)
    {
        $pesan = $this->admin->deleteSection($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('/admin/section');
    }
}


//    public function devisi()
//     {

//         $data = [
//             'title' => 'Managemen Devisi',
//             'visitor' =>  $this->admin->getDevisi(),
//         ];
//         // dd($data);
//         return view('conten/home/devisi', $data);
//     }

//     public function add_devisi()
//     {
//         $devisi = $this->request->getVar('privilege_name');
//         $pesan = $this->admin->addDevisi($devisi);
//         session()->setFlashdata('pesan', $pesan);
//         return redirect()->to('/admin/devisi');
//     }

//     public function edit_devisi($id)
//     {
//         $devisi = $this->request->getVar('privilege_name');
//         $pesan = $this->admin->editSection($id, $devisi);
//         session()->setFlashdata('pesan', $pesan);
//         return redirect()->to('/admin/devisi');
    // }