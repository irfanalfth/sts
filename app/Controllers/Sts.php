<?php

namespace App\Controllers;

use App\Models\Model_kategori;
use App\Models\Model_sts;
use App\Models\Model_user;
use App\Models\Model_home;
use TCPDF;

class Sts extends BaseController
{

    public function __construct()
    {
        $this->Model_kategori =  new Model_kategori();
        $this->Model_sts =  new Model_sts();
        $this->Model_user =  new Model_user();
        $this->Model_home =  new Model_home();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Sts Pajak',
            'sts' => $this->Model_sts->all_data(),
            'kategori' => $this->Model_sts->getdatapajak(),
            'datauser' => $this->Model_sts->getuser(),
            'tahun' => $this->Model_sts->gettahun(),
            'isi' => 'sts/v_laporan'
        );
        return view('layout/v_wrapper', $data);
    }

    // public function index()
    // {
    //     $tanggalawal = $this->request->getPost('tanggalawal');
    //     $tanggalakhir = $this->request->getPost('tanggalakhir');
    //     $tahun1 = $this->request->getPost('tahun1');
    //     $tahun2 = $this->request->getPost('tahun2');
    //     $bulanawal = $this->request->getPost('bulanawal');
    //     $bulanakhir = $this->request->getPost('bulanakhir');

    //     $data['sts'] = $this->Model_sts->all_data();
    //     $data['kategori'] = $this->Model_sts->getdatapajak();
    //     $data['datauser'] = $this->Model_sts->getuser();
    //     $data['tahun'] = $this->Model_sts->gettahun();
    //     $data['title'] = 'Sts Pajak';
    //     $data['subtitle'] = 'Dari Tanggal : ' . $tanggalawal . ' Sampai Tanggal : ' . $tanggalakhir;
    //     $data['subtitle'] = 'Dari Bulan : ' . $bulanawal . ' Sampai Bulan : ' . $bulanakhir . ' Tahun : ' . $tahun1;
    //     $data['subtitle'] = 'Tahun : ' . $tahun2;
    //     $data['isi'] = 'sts/v_index';

    //     return view('layout/v_wrapper', $data);
    // }

    public function filter()
    {
        $tanggalawal = $this->request->getPost('tanggalawal');
        $tanggalakhir = $this->request->getPost('tanggalakhir');
        $tahun1 = $this->request->getPost('tahun1');
        $bulanawal = $this->request->getPost('bulanawal');
        $bulanakhir = $this->request->getPost('bulanakhir');
        $tahun2 = $this->request->getPost('tahun2');
        $nilaifilter = $this->request->getPost('nilaifilter');

        //Tambahan
        $nama_kategori = $this->request->getPost('nama_kategori');
        $nama_user = $this->request->getPost('nama_user');

        $nama_kategori2 = $this->request->getPost('nama_kategori2');
        $nama_user2 = $this->request->getPost('nama_user2');

        if ($nilaifilter == 1) {

            $data = array(
                'title' => 'STS Pajak',
                'judul' => 'Data Pajak By Tanggal',
                'subtitle' => 'Dari Tanggal : ' . $tanggalawal . ' Sampai Tanggal : ' . $tanggalakhir,
                'isi' => 'sts/v_index'
            );
            if ($nama_kategori == null and $nama_user == null) {
                $where = array(
                    'tanggal >=' => $tanggalawal,
                    'tanggal <=' => $tanggalakhir,
                );
                $data['sts'] = $this->Model_sts->filterbytanggal($where);
            } else {

                if ($nama_user == null) {
                    $where = array(
                        'tanggal >=' => $tanggalawal,
                        'tanggal <=' => $tanggalakhir,
                        'nama_kategori' => $nama_kategori,
                    );
                    $data['sts'] = $this->Model_sts->filterbytanggal($where);
                } else if ($nama_kategori == null) {
                    $where = array(
                        'tanggal >=' => $tanggalawal,
                        'tanggal <=' => $tanggalakhir,
                        'id_user' => $nama_user,
                    );
                    $data['sts'] = $this->Model_sts->filterbytanggal($where);
                } else {
                    $where = array(
                        'tanggal >=' => $tanggalawal,
                        'tanggal <=' => $tanggalakhir,
                        'id_user' => $nama_user,
                        'nama_kategori' => $nama_kategori,
                    );
                    $data['sts'] = $this->Model_sts->filterbytanggal($where);
                }
            }

            return view('layout/v_wrapper', $data);
        } elseif ($nilaifilter == 2) {

            $data = array(
                'title' => 'STS Pajak',
                'judul' => 'Data Pajak By Bulan',
                'subtitle' => 'Dari Bulan : ' . $bulanawal . ' Sampai Bulan : ' . $bulanakhir . ' Tahun : ' . $tahun1,
                'sts' => $this->Model_sts->filterbybulan($tahun1, $bulanawal, $bulanakhir),
                'isi' => 'sts/v_index'
            );
            return view('layout/v_wrapper', $data);
        } elseif ($nilaifilter == 3) {

            $data = array(
                'title' => 'STS Pajak',
                'judul' => 'Data Pajak By Tahun',
                'subtitle' => 'Tahun : ' . $tahun2,
                'isi' => 'sts/v_index'
            );

            if ($nama_kategori2 == null and $nama_user2 == null) {
                $data['sts'] = $this->Model_sts->filterbytahun($tahun2);
            } else {

                if ($nama_kategori2 == null) {
                    $where = array(
                        'YEAR(tanggal)' => $tahun2,
                        'nama_kategori' => $nama_kategori2,
                    );

                    $data['sts'] = $this->Model_sts->filterbytahun2($where);
                } else if ($nama_user2 == null) {
                    $where = array(
                        'YEAR(tanggal)' => $tahun2,
                        'id_user' => $nama_user2,
                    );

                    $data['sts'] = $this->Model_sts->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tanggal)' => $tahun2,
                        'id_user' => $nama_user2,
                        'nama_kategori' => $nama_kategori2,
                    );

                    $data['sts'] = $this->Model_sts->filterbytahun2($where);
                }
            }

            return view('layout/v_wrapper', $data);
        }
    }

    public function printpdf()
    {
        $data = array(
            'sts' => $this->Model_sts->all_data(),
        );

        $html = view('sts/v_printpdf', $data);

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

        $pdf->Output('PajakRestoran.pdf', 'I');
    }

    public function excel()
    {
        $data = array(
            'sts' => $this->Model_sts->all_data(),
        );
        return view('sts/v_excel', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add STS Pajak Restoran',
            'kategori' => $this->Model_kategori->all_data(),
            'isi' => 'sts/v_add'
        );
        return view('layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

    public function insert()
    {
        if ($this->validate([
            'tanggal' => [
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
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'ket_tempat' => [
                'label'  => 'Keterangan Tempat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'jumlah_pajak' => [
                'label'  => 'Jumlah',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
        ])) {
            //jika valid
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'nama_wajib' => $this->request->getPost('nama_wajib'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'ket_tempat' => $this->request->getPost('ket_tempat'),
                'id_user' => session()->get('id_user'),
                'jumlah_pajak' => $this->request->getPost('jumlah_pajak'),
            );
            $this->Model_sts->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
            return redirect()->to(base_url('sts/index'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('sts/add'));
        }
    }

    //edit
    public function edit($id_sts)
    {
        $data = array(
            'title' => 'Edit Sts Pajak Restoran',
            'kategori' => $this->Model_kategori->all_data(),
            'sts' => $this->Model_sts->detail_data($id_sts),
            'isi' => 'sts/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_sts)
    {
        if ($this->validate([
            'tanggal' => [
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
                    'required' => '{field} sts diisi !!',
                ]
            ],
            'ket_tempat' => [
                'label'  => 'Keterangan Tempat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} sts diisi !!',
                ]
            ],
            'jumlah_pajak' => [
                'label'  => 'Jumlah',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} sts diisi !!',
                ]
            ],
        ])) {
            //jika valid
            $data = array(
                'id_sts' => $id_sts,
                'tanggal' => $this->request->getPost('tanggal'),
                'nama_wajib' => $this->request->getPost('nama_wajib'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'ket_tempat' => $this->request->getPost('ket_tempat'),
                'id_user' => session()->get('id_user'),
                'jumlah_pajak' => $this->request->getPost('jumlah_pajak'),
            );
            $this->Model_sts->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Update !!');
            return redirect()->to(base_url('sts'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('sts/edit' . $id_sts));
        }
    }

    public function delete($id_sts)
    {
        $data = array(
            'id_sts' => $id_sts,
        );
        $this->Model_sts->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
        return redirect()->to(base_url('sts'));
    }

    public function viewsts($id_sts)
    {
        $data = array(
            'title' => 'View sts Pajak',
            'sts' => $this->Model_sts->detail_data($id_sts),
            'isi' => 'sts/v_view'
        );
        return view('layout/v_wrapper', $data);
    }
}
