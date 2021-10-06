<?php

namespace App\Controllers;

use App\Models\Model_home;
use App\Models\Model_sts;

class Home extends BaseController

{
	public function __construct()
	{
		$this->Model_home = new Model_home();
		$this->Model_sts = new Model_sts();
	}

	public function index()
	{

		$data = array(
			'title' => 'Home',
			'tot_arsip' => $this->Model_home->tot_arsip(),
			'tot_kategori' => $this->Model_home->tot_kategori(),
			'tot_sts' => $this->Model_home->tot_sts(),
			'tot_laporan' => $this->Model_home->tot_laporan(),
			'rekapbulan' => $this->Model_home->getPerbulan(),
			'total' => $this->Model_home->getPendapatan(),
			'sts' => $this->Model_home->all_data(),
			'isi' => 'v_home'
		);
		return view('layout/v_wrapper', $data);
	}


	//--------------------------------------------------------------------

}
