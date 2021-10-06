<?php

namespace App\Controllers;

use App\Models\Model_home;
use App\Models\Model_sts;

class Grafik extends BaseController

{
    public function __construct()
    {
        $this->Model_home = new Model_home();
        $this->Model_sts = new Model_sts();
    }

    public function index()
    {
        $data['tot_kategori'] = $this->Model_home->tot_kategori();
        $data['rekapbulan'] = $this->Model_home->getPerbulan();
        $data['title'] = 'Total Keseluruhan Pajak';
        $data['isi'] = 'v_grafiktotal';

        return view('layout/v_wrapper', $data);
    }

    public function semua()
    {
        $data['tot_kategori'] = $this->Model_home->tot_kategori();
        $data['rekaprestoran'] = $this->Model_home->getRestoran();
        $data['rekaphotel'] = $this->Model_home->getHotel();
        $data['rekapreklame'] = $this->Model_home->getReklame();
        $data['rekaphiburan'] = $this->Model_home->getHiburan();
        $data['rekappbb'] = $this->Model_home->getPbb();
        $data['rekapppj'] = $this->Model_home->getPpj();
        $data['title'] = 'Total Berdasarkan Pajak';
        $data['isi'] = 'v_grafikpajak';

        return view('layout/v_wrapper', $data);
    }


    //--------------------------------------------------------------------

}
