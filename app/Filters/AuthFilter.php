<?php
//=================== T H A N K   Y O U ===================//
//============= TELAH MENGUNAKAN CODE SAYA ================//
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{

	public function before(RequestInterface $request, $arguments = null)
	{
		if (session()->get('logged_in') != true) {
			$data = ['stts' => false, 'msg' => 'lakukan login terlebih dahulu...!'];
			session()->setFlashdata('pesan', $data);
			return redirect()->to(base_url('auth'));
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//kondisi
		if (session()->get('logged_in') == true) {
			return redirect()->to(base_url('home'));
		}
	}
}
//=========================================================//
//     R I N G G A   S E P T I A  P R I B A D I            //
//=========================================================// 