<?php

namespace App\Controllers;

use App\Models\Model_user;
use App\Models\Model_home;

class User extends BaseController
{
	public function __construct()
	{
		$this->Model_user = new Model_user();
		$this->Model_home = new Model_home();
		helper('form');
	}

	public function index()
	{
		$data = array(
			'title' => 'User',
			'user' => $this->Model_user->all_data(),
			'isi' => 'user/v_index'
		);
		return view('layout/v_wrapper', $data);
	}


	public function add()
	{
		$data = array(
			'title' => 'Add User',
			'isi' => 'user/v_add'
		);
		return view('layout/v_wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Nama User',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			],
			'email' => [
				'label'  => 'E-Mail',
				'rules'  => 'required|is_unique[tbl_user.email]',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
					'is_unique' => '{field} Sudah Ada, Input {field} Lain !!',
				]
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
				]
			],
			'foto' => [
				'label'  => 'Foto',
				'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} Wajib diisi !!',
					'max_size' => 'Ukuran {field} Max 1024 KB !!',
					'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				]
			],
		])) {
			//mengambil file foto yang akan diupload di form
			$foto = $this->request->getFile('foto');

			//merandom nama file foto
			$nama_file = $foto->getRandomName();

			//jika valid
			$data = array(
				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'foto' => $nama_file,
			);
			$foto->move('foto', $nama_file); //direktori upload file
			$this->Model_user->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
			return redirect()->to(base_url('user'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/add'));
		}
	}

	public function edit($id_user)
	{
		$data = array(
			'title' => 'Edit User',
			'user' => $this->Model_user->detail_data($id_user),
			'isi' => 'user/v_edit'
		);
		return view('layout/v_wrapper', $data);
	}

	public function update($id_user)
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Nama User',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
				]
			],
		])) {
			$data = array(
				'id_user' => $id_user,
				'nama_user' => $this->request->getPost('nama_user'),
				'password' => $this->request->getPost('password'),
				//'foto' => $nama_file,
			);
			//$foto->move('foto', $nama_file); //direktori upload file
			$this->Model_user->edit($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
			return redirect()->to(base_url('user'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/edit' . $id_user));
		}
	}

	public function delete($id_user)
	{
		//menghapus foto lama
		$user = $this->Model_user->detail_data($id_user);
		if ($user['foto'] != "") {
			unlink('foto/' . $user['foto']);
		}

		$data = array(
			'id_user' => $id_user,
		);
		$this->Model_user->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
		return redirect()->to(base_url('user'));
	}
	//--------------------------------------------------------------------

}
