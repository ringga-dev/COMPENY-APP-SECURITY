<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UndianModel;

class GlobalView extends BaseController
{
    public function __construct()
    {
        $this->undian = new UndianModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Managemen Hadiah',
            'user' => $this->undian->getHadiaUndia(),
        ];
        return view('conten/undian/undian', $data);
    }

    public function devisi()
    {
        return json_encode($this->undian->getDevisi());
    }

    public function section()
    {
        return json_encode($this->undian->getSection());
    }











    //loginc untuk absen mengunakan bet

    public function absen_user()
    {
        $data = [
            'title' => 'Absen User',

        ];

        return view('conten/absen/absen_user', $data);
    }


    //loginc untuk absen kariawan etowa

    public function absen_etowa()
    {
        $data = [
            'title' => 'Absen Etowa',

        ];

        return view('conten/absen/absen_etowa', $data);
    }




    public function home()
    {
        $data = [
            'title' => 'Absen Etowa',

        ];

        return view('conten/absen/home', $data);
    }
}
