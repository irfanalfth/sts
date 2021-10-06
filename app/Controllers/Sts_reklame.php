<?php

namespace App\Controllers;

use App\Models\Model_kategori;
use App\Models\Model_sts_reklame;
use TCPDF;

class Sts_reklame extends BaseController
{

    public function __construct()
    {
        $this->Model_sts_reklame =  new Model_sts_reklame();
        $this->Model_kategori =  new Model_kategori();
        helper('form');
    }

    public function index()
    {

        $data = array(
            'title' => 'Sts Pajak Reklame',
            'sts' => $this->Model_sts_reklame->all_data(),
            'isi' => 'sts-reklame/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    // public function index()
    // {
    //     if (empty($tgl_awal) or empty($tgl_akhir)) {
    //         $data = array(
    //             'title' => 'sts Pajak',
    //             'sts' => $this->Model_sts_reklame->all_data(),
    //             'isi' => 'sts/v_index'
    //         );
    //         return view('layout/v_wrapper', $data);
    //     } else {
    //         $tgl_awal = $this->request->get('tgl_awal');
    //         $tgl_akhir = $this->request->get('tgl_akhir');
    //         $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
    //         $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
    //         $data = array(
    //             'title' => 'sts Pajak' . $tgl_awal . 's/d' . $tgl_akhir,
    //             'sts' => $this->Model_sts_reklame->view_by_date($tgl_awal, $tgl_akhir),
    //             'isi' => 'sts/v_index?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir,
    //         );
    //         return view('layout/v_wrapper', $data);
    //     }
    // }

    public function printpdf()
    {
        $data = array(
            'sts' => $this->Model_sts_reklame->all_data(),
        );

        $html = view('sts-reklame/v_printpdf', $data);

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

        $pdf->Output('PajakReklame.pdf', 'I');
    }

    public function excel()
    {
        $data = array(
            'sts' => $this->Model_sts_reklame->all_data(),
        );
        return view('sts-reklame/v_excel', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add STS Pajak Reklame',
            'kategori' => $this->Model_kategori->all_data(),
            'isi' => 'sts-reklame/v_add'
        );
        return view('layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

    public function insert()
    {
        if ($this->validate([
            'tgl' => [
                'label'  => 'Tanggal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !!',
                ]
            ],
            'nama_wajib' => [
                'label'  => 'Nama Wajib Pajak',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !!',
                ]
            ],
            'nama_kategori' => [
                'label'  => 'Jenis Pajak',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !!',
                ]
            ],
            'tempat' => [
                'label'  => 'Keterangan Tempat',
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
                'tgl' => $this->request->getPost('tgl'),
                'nama_wajib' => $this->request->getPost('nama_wajib'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'tempat' => $this->request->getPost('tempat'),
                'jumlah' => $this->request->getPost('jumlah'),
            );
            $this->Model_sts_reklame->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
            return redirect()->to(base_url('sts_reklame'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('sts_reklame/add'));
        }
    }

    //edit
    public function edit($id_sts_r)
    {
        $data = array(
            'title' => 'Edit Sts Pajak Reklame',
            'kategori' => $this->Model_kategori->all_data(),
            'sts' => $this->Model_sts_reklame->detail_data($id_sts_r),
            'isi' => 'sts-reklame/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_sts_r)
    {
        if ($this->validate([
            'tgl' => [
                'label'  => 'Tanggal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !!',
                ]
            ],
            'nama_wajib' => [
                'label'  => 'Nama Wajib Pajak',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !!',
                ]
            ],
            'nama_kategori' => [
                'label'  => 'Jenis Pajak',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !!',
                ]
            ],
            'tempat' => [
                'label'  => 'Keterangan Tempat',
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
                'id_sts_r' => $id_sts_r,
                'tgl' => $this->request->getPost('tgl'),
                'nama_wajib' => $this->request->getPost('nama_wajib'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'tempat' => $this->request->getPost('tempat'),
                'jumlah' => $this->request->getPost('jumlah'),
            );
            $this->Model_sts_reklame->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
            return redirect()->to(base_url('sts_reklame'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('sts_reklame/edit' . $id_sts_r));
        }
    }

    public function delete($id_sts_r)
    {
        $data = array(
            'id_sts_r' => $id_sts_r,
        );
        $this->Model_sts_reklame->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
        return redirect()->to(base_url('sts_reklame'));
    }

    public function viewsts($id_sts_r)
    {
        $data = array(
            'title' => 'View sts Pajak',
            'sts' => $this->Model_sts_reklame->detail_data($id_sts_r),
            'isi' => 'sts/v_view'
        );
        return view('layout/v_wrapper', $data);
    }
}
