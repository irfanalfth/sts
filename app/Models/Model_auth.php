<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    public function login($nama_user, $password)
    {
        return $this->db->table('tbl_user')->where([
            'nama_user' => $nama_user,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
