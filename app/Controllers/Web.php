<?php

namespace App\Controllers;

use App\Models\Model_sts;

class Web extends BaseController
{
    public function __construct()
    {
        $this->Model_sts = new Model_sts();
        helper('form');
    }

    public function index()
    {
        $data['title']        = 'Arsip Pajak';
        $data['body']        = 'front/home';
        return view('front/v_web', $data);
    }
    public function about()
    {
        $data['title']        = 'Arsip Pajak';
        $data['body']        = 'front/about';
        return view('front/v_web', $data);
    }
    public function contact()
    {
        $data['title']    = 'Arsip Pajak';
        $data['body']    = 'front/contact';
        return view('front/v_web', $data);
    }
}
