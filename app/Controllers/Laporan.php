<?php

namespace App\Controllers;

use App\Models\Model_kategori;
use App\Models\Model_sts;
use App\Models\Model_user;
use App\Models\Model_home;
use TCPDF;

class Laporan extends BaseController
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
            'title' => 'Laporan STS',
            'sts' => $this->Model_sts->all_data(),
            'kategori' => $this->Model_sts->getdatapajak(),
            'datauser' => $this->Model_sts->getuser(),
            'tahun' => $this->Model_sts->gettahun(),
            'isi' => 'v_laporan'
        );
        return view('layout/v_wrapper', $data);
    }

    public function filter()
    {
        $tanggalawal = $this->request->getPost('tanggalawal');
        $tanggalakhir = $this->request->getPost('tanggalakhir');
        $tahun1 = $this->request->getPost('tahun1');
        $bulan = $this->request->getPost('bulan');
        $nilaifilter = $this->request->getPost('nilaifilter');
        
        $nama_kategori = $this->request->getPost('nama_kategori');

        $nama_kategori2 = $this->request->getPost('nama_kategori2');

        if ($nilaifilter == 1) {
            $data = array(
                'title' => 'STS Pajak',
                'judul' => 'BADAN PENGELOLAAN PAJAK DAN RETRIBUSI DAERAH',
                'subjudul' => 'Laporan Pendapatan ' . $nama_kategori . ' Kota Metro',
                'subtitle' => 'Dari Tanggal :' . $tanggalawal . ' Sampai Tanggal :' . $tanggalakhir,
                'isi' => 'v_print'
            );

            if ($nama_kategori == null) {
                $where = array(
                    'tanggal >=' => $tanggalawal,
                    'tanggal <=' => $tanggalakhir,
                );

                $data['datafilter'] = $this->Model_sts->filterbytanggal($where);
            } else {
                $where = array(
                    'tanggal >=' => $tanggalawal,
                    'tanggal <=' => $tanggalakhir,
                    'nama_kategori' => $nama_kategori,
                );
                $data['datafilter'] = $this->Model_sts->filterbytanggal($where);
            }

            return view('layout/v_wrapper', $data);
        } elseif ($nilaifilter == 2) {
            $data = array(
                'title' => 'STS Pajak',
                'judul' => 'BADAN PENGELOLAAN PAJAK DAN RETRIBUSI DAERAH',
                'subjudul' => 'Laporan Pendapatan Pajak Daerah Kota Metro',
                'subtitle' => 'Bulan :' . $bulan,
                'datafilter' => $this->Model_sts->filterbybulan($tahun1, $bulan),
                'isi' => 'v_printAll'
            );

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
}
