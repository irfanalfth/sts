<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_wajib extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_wajib')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_wajib.id_kategori', 'left')
            ->orderBy('id_wajib', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_wajib)
    {
        return $this->db->table('tbl_wajib')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_wajib.id_kategori', 'left')
            ->where('id_wajib', $id_wajib)
            ->get()
            ->getRowArray();
    }

    public function view_by_date($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->table('tbl_wajib')
            ->where('DATE(tgl_pendaftaran) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir)
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_wajib')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_wajib')
            ->where('id_wajib', $data['id_wajib'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_wajib')
            ->where('id_wajib', $data['id_wajib'])
            ->delete($data);
    }
}
