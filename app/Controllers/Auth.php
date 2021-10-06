<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Model_auth = new Model_auth();
		//Do you magic here
	}

	public function index()
	{
		$data = array(
			'title' => 'Login',
		);
		return view('v_login', $data);
	}

	public function login()
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Username',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			]
		])) {
			//jika valid
			$nama_user = $this->request->getPost('nama_user');
			$password = $this->request->getPost('password');
			$cek = $this->Model_auth->login($nama_user, $password);
			if ($cek) {
				//jika datanya cocok
				session()->set('log', true);
				session()->set('id_user', $cek['id_user']);
				session()->set('nama_user', $cek['nama_user']);
				session()->set('email', $cek['email']);
				session()->set('foto', $cek['foto']);
				return redirect()->to(base_url('home'));
			} else {
				session()->setFlashdata('pesan', 'Login Gagal !!, Username atau Password Salah');
				return redirect()->to(base_url('auth/index'));
			}
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/index'));
		}
	}

	public function logout()
	{
		session()->remove('log');
		session()->remove('nama_user');
		session()->remove('email');
		session()->remove('foto');

		session()->setFlashdata('pesan', 'Anda Telah Logout !!');
		return redirect()->to(base_url('auth'));
	}
	//--------------------------------------------------------------------

}
