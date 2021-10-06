<?php

namespace App\Controllers;

use App\Models\Model_wajib;
use App\Models\Model_kategori;
use TCPDF;

class Wajib extends BaseController
{
    public function __construct()
    {
        $this->Model_wajib =  new Model_wajib();
        $this->Model_kategori =  new Model_kategori();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Wajib Pajak',
            'wajib' => $this->Model_wajib->all_data(),
            'isi' => 'wajib/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    // public function index()
    // {
    //     if (empty($tgl_awal) or empty($tgl_akhir)) {
    //         $data = array(
    //             'title' => 'Wajib Pajak',
    //             'wajib' => $this->Model_wajib->all_data(),
    //             'isi' => 'wajib/v_index'
    //         );
    //         return view('layout/v_wrapper', $data);
    //     } else {
    //         $tgl_awal = $this->request->get('tgl_awal');
    //         $tgl_akhir = $this->request->get('tgl_akhir');
    //         $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    //         $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    //         $data = array(
    //             'title' => 'Wajib Pajak' . $tgl_awal . 's/d' . $tgl_akhir,
    //             'wajib' => $this->Model_wajib->view_by_date($tgl_awal, $tgl_akhir),
    //             'isi' => 'wajib/v_index?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir,
    //         );
    //         return view('layout/v_wrapper', $data);
    //     }
    // }

    public function printpdf()
    {
        $data = array(
            'wajib' => $this->Model_wajib->all_data(),
        );

        $html = view('v_printpdf', $data);

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');

        $pdf->Output('WajibPajak.pdf', 'I');
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Wajib Pajak',
            'kategori' => $this->Model_kategori->all_data(),
            'isi' => 'wajib/v_add'
        );
        return view('layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

    public function insert()
    {
        if ($this->validate([
            'npwpd' => [
                'label'  => 'NPWPD',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'tgl_pendaftaran' => [
                'label'  => 'Tanggal Pendaftaran',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'nama_usaha' => [
                'label'  => 'Nama Usaha',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'alamat_pemilik' => [
                'label'  => 'Alamat Pemilik',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'nama_pemilik' => [
                'label'  => 'Nama Pemilik',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'alamat_objek' => [
                'label'  => 'Alamat Objek',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'pen_bulan' => [
                'label'  => 'Pendapatan Perbulan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'jumlah' => [
                'label'  => 'Jumlah',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
        ])) {
            //jika valid
            $data = array(
                'npwpd' => $this->request->getPost('npwpd'),
                'tgl_pendaftaran' => $this->request->getPost('tgl_pendaftaran'),
                'nama_usaha' => $this->request->getPost('nama_usaha'),
                'alamat_pemilik' => $this->request->getPost('alamat_pemilik'),
                'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                'alamat_objek' => $this->request->getPost('alamat_objek'),
                'pen_bulan' => $this->request->getPost('pen_bulan'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'jumlah' => $this->request->getPost('jumlah'),
            );
            $this->Model_wajib->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
            return redirect()->to(base_url('wajib'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('wajib/add'));
        }
    }

    //edit
    public function edit($id_wajib)
    {
        $data = array(
            'title' => 'Edit Wajib Data',
            'kategori' => $this->Model_kategori->all_data(),
            'wajib' => $this->Model_wajib->detail_data($id_wajib),
            'isi' => 'wajib/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_wajib)
    {
        if ($this->validate([
            'npwpd' => [
                'label'  => 'NPWPD',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'tgl_pendaftaran' => [
                'label'  => 'Tanggal Pendaftaran',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'nama_usaha' => [
                'label'  => 'Nama Usaha',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'alamat_pemilik' => [
                'label'  => 'Alamat Pemilik',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'nama_pemilik' => [
                'label'  => 'Nama Pemilik',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'alamat_objek' => [
                'label'  => 'Alamat Objek',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'pen_bulan' => [
                'label'  => 'Pendapatan Perbulan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'jumlah' => [
                'label'  => 'Jumlah',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
        ])) {
            //jika valid
            $data = array(
                'id_wajib' => $id_wajib,
                'npwpd' => $this->request->getPost('npwpd'),
                'tgl_pendaftaran' => $this->request->getPost('tgl_pendaftaran'),
                'nama_usaha' => $this->request->getPost('nama_usaha'),
                'alamat_pemilik' => $this->request->getPost('alamat_pemilik'),
                'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                'alamat_objek' => $this->request->getPost('alamat_objek'),
                'pen_bulan' => $this->request->getPost('pen_bulan'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'jumlah' => $this->request->getPost('jumlah'),
            );
            $this->Model_wajib->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
            return redirect()->to(base_url('wajib'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('wajib/edit' . $id_wajib));
        }
    }

    public function delete($id_wajib)
    {
        $data = array(
            'id_wajib' => $id_wajib,
        );
        $this->Model_wajib->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
        return redirect()->to(base_url('wajib'));
    }

    public function viewwajib($id_wajib)
    {
        $data = array(
            'title' => 'View Wajib Pajak',
            'wajib' => $this->Model_wajib->detail_data($id_wajib),
            'isi' => 'wajib/v_view'
        );
        return view('layout/v_wrapper', $data);
    }
}
