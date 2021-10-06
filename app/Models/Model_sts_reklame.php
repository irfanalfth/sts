<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_sts_reklame extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_sts_reklame')
            ->orderBy('id_sts_r', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_sts_r)
    {
        return $this->db->table('tbl_sts_reklame')
            ->where('id_sts_r', $id_sts_r)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_sts_reklame')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_sts_reklame')
            ->where('id_sts_r', $data['id_sts_r'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_sts_reklame')
            ->where('id_sts_r', $data['id_sts_r'])
            ->delete($data);
    }
}
