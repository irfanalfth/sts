<?php

namespace App\Controllers;

use App\Models\Model_arsip;
use App\Models\Model_kategori;

class Arsip extends BaseController
{
	public function __construct()
	{
		$this->Model_arsip =  new Model_arsip();
		$this->Model_kategori =  new Model_kategori();
		helper('form');
	}

	public function index()
	{
		$data = array(
			'title' => 'Arsip',
			'arsip' => $this->Model_arsip->all_data(),
			'isi' => 'arsip/v_index'
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array(
			'title' => 'Add Arsip',
			'kategori' => $this->Model_kategori->all_data(),
			'isi' => 'arsip/v_add'
		);
		return view('layout/v_wrapper', $data);
	}
	//--------------------------------------------------------------------

	public function insert()
	{
		if ($this->validate([
			'nama_arsip' => [
				'label'  => 'Nama Arsip',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			],
			'deskripsi' => [
				'label'  => 'Deskripsi',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
				]
			],
			'status' => [
				'label'  => 'Status',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
				]
			],
			'file_arsip' => [
				'label'  => 'File Arsip',
				'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
				'errors' => [
					'uploaded' => '{field} Wajib diisi !!',
					'max_size' => 'Ukuran {field} Max 2048 KB !!',
					'ext_in' => 'Format {field} Wajib .PDF',
				]
			],
		])) {
			//mengambil file arsip yang akan diupload di form
			$file_arsip = $this->request->getFile('file_arsip');

			//merandom nama file arsip
			$nama_file = $file_arsip->getRandomName();
			//Mengambil Ukuran File
			$ukuran_file = $file_arsip->getSize('kb');

			//jika valid
			$data = array(
				'no_arsip' => $this->request->getPost('no_arsip'),
				'nama_arsip' => $this->request->getPost('nama_arsip'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'status' => $this->request->getPost('status'),
				'tgl_upload' => date('Y-m-d'),
				'tgl_update' => date('Y-m-d'),
				'id_user' => session()->get('id_user'),
				'file_arsip' => $nama_file,
				'ukuran_file' => $ukuran_file,
			);
			$file_arsip->move('file_arsip', $nama_file); //direktori upload file
			$this->Model_arsip->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
			return redirect()->to(base_url('arsip'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('arsip/add'));
		}
	}

	//edit
	public function edit($id_arsip)
	{
		$data = array(
			'title' => 'Edit Arsip',
			'kategori' => $this->Model_kategori->all_data(),
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'isi' => 'arsip/v_edit'
		);
		return view('layout/v_wrapper', $data);
	}

	public function update($id_arsip)
	{
		if ($this->validate([
			'nama_arsip' => [
				'label'  => 'Nama Arsip',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			],
			'deskripsi' => [
				'label'  => 'Deskripsi',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
				]
			],
			'status' => [
				'label'  => 'Status',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!',
				]
			],
			'file_arsip' => [
				'label'  => 'File Arsip',
				'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
				'errors' => [
					'max_size' => 'Ukuran {field} Max 2048 KB !!',
					'ext_in' => 'Format {field} Wajib .PDF',
				]
			],
		])) {
			//mengambil file arsip yang akan diupload di form
			$file_arsip = $this->request->getFile('file_arsip');
			if ($file_arsip->getError() == 4) {
				//jika file tidak diganti
				$data = array(
					'id_arsip' => $id_arsip,
					'no_arsip' => $this->request->getPost('no_arsip'),
					'nama_arsip' => $this->request->getPost('nama_arsip'),
					'deskripsi' => $this->request->getPost('deskripsi'),
					'status' => $this->request->getPost('status'),
					'tgl_update' => date('Y-m-d'),
					'id_user' => session()->get('id_user'),
				);
				$this->Model_arsip->edit($data);
			} else {
				//jika file diganti
				//menghapus foto lama
				$arsip = $this->Model_arsip->detail_data($id_arsip);
				if ($arsip['file_arsip'] != "") {
					unlink('file_arsip/' . $arsip['file_arsip']);
				}
				//merandom nama file arsip
				$nama_file = $file_arsip->getRandomName();
				//Mengambil Ukuran File
				$ukuran_file = $file_arsip->getSize('kb');

				//jika valid
				$data = array(
					'id_arsip' => $id_arsip,
					'no_arsip' => $this->request->getPost('no_arsip'),
					'nama_arsip' => $this->request->getPost('nama_arsip'),
					'deskripsi' => $this->request->getPost('deskripsi'),
					'status' => $this->request->getPost('status'),
					'tgl_update' => date('Y-m-d'),
					'id_user' => session()->get('id_user'),
					'file_arsip' => $nama_file,
					'ukuran_file' => $ukuran_file,
				);
				$file_arsip->move('file_arsip', $nama_file); //direktori upload file
				$this->Model_arsip->edit($data);
			}
			session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
			return redirect()->to(base_url('arsip'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('arsip/edit' . $id_arsip));
		}
	}

	public function delete($id_arsip)
	{
		//menghapus foto lama
		$arsip = $this->Model_arsip->detail_data($id_arsip);
		if ($arsip['file_arsip'] != "") {
			unlink('file_arsip/' . $arsip['file_arsip']);
		}

		$data = array(
			'id_arsip' => $id_arsip,
		);
		$this->Model_arsip->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
		return redirect()->to(base_url('arsip'));
	}

	public function viewpdf($id_arsip)
	{
		$data = array(
			'title' => 'View Arsip',
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'isi' => 'arsip/v_viewpdf'
		);
		return view('layout/v_wrapper', $data);
	}

	public function statusAktif($id_arsip)
	{
		$data = [
			'id_arsip' => $id_arsip,
			'status' => 1
		];
		$this->ModelJadwal->edit($data);
		session()->setFlashdata('pesan', 'Status Lowongan Berhasil Di Ganti !!!');
		return redirect()->to('/jadwal');
	}
	public function statusNonAktif($id_arsip)
	{
		$data = [
			'id_arsip' => $id_arsip,
			'status' => 0
		];
		$this->ModelJadwal->edit($data);
		session()->setFlashdata('pesan', 'Status Lowongan Berhasil Di Ganti !!!');
		return redirect()->to('/jadwal');
	}
}
