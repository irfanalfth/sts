<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_kategori extends Model
{
    protected $table = 'tbl_kategori';

    public function all_data()
    {
        return $this->db->table('tbl_kategori')->get()->getResultArray();
    }

    public function getwhere($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query;
    }

    public function add($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }
}
