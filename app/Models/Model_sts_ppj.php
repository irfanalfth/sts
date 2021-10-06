<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_sts_ppj extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_sts_ppj')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_sts_ppj.id_kategori', 'left')
            ->orderBy('id_sts', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_sts)
    {
        return $this->db->table('tbl_sts_ppj')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_sts_ppj.id_kategori', 'left')
            ->where('id_sts', $id_sts)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_sts_ppj')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_sts_ppj')
            ->where('id_sts', $data['id_sts'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_sts_ppj')
            ->where('id_sts', $data['id_sts'])
            ->delete($data);
    }
}
