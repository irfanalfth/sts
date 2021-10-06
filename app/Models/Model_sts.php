<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;
use stdClass;

class Model_sts extends Model
{
    protected $table = 'tbl_kategori';
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function all_data()
    {
        return $this->db->table('tbl_sts')
            ->join('tbl_user', 'tbl_user.id_user = tbl_sts.id_user', 'left')
            ->orderBy('id_sts', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getdatapajak()
    {
        return $this->db->query("SELECT * FROM tbl_kategori ORDER BY nama_kategori ASC")
            ->getResult();
    }

    public function getuser()
    {
        return $this->db->query("SELECT * FROM tbl_user ORDER BY nama_user ASC")
            ->getResult();
    }

    public function gettahun()
    {
        return $this->db->query("SELECT YEAR(tanggal) AS tahun FROM 
        tbl_sts GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC")
            ->getResult();
    }

    public function filterbytanggal1($tanggalawal, $tanggalakhir)
    {
        return $this->db->query("SELECT * FROM tbl_sts where 
        tanggal BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal ASC")
            ->getResult();
    }

    
    public function filterbytanggal($where)
    {
        return $this->db->table('tbl_sts')
        ->getWhere($where)
        ->getResult();
    }
    
    public function filterSUM($tanggalawal, $tanggalakhir)
    {
        $asd = $this->db->query("SELECT tanggal, nama_kategori, SUM(jumlah_pajak) AS total FROM tbl_sts where 
        tanggal BETWEEN '$tanggalawal' and '$tanggalakhir' GROUP BY nama_kategori ORDER BY tanggal ASC")
            ->getResult();
        
        return json_decode(json_encode($asd), true);
    }
    
    public function filterbybulan($tahun1, $bulan)
    {
        $asd = $this->db->query("SELECT tanggal, nama_kategori, SUM(jumlah_pajak) AS total FROM tbl_sts where 
        YEAR(tanggal) = '$tahun1' and MONTH(tanggal) = $bulan GROUP BY nama_kategori ORDER BY tanggal ASC")
            ->getResult();
            
            return json_decode(json_encode($asd), true);
    }

    public function detail_data($id_sts)
    {
        return $this->db->table('tbl_sts')
            ->join('tbl_user', 'tbl_user.id_user = tbl_sts.id_user', 'left')
            ->where('id_sts', $id_sts)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_sts')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_sts')
            ->where('id_sts', $data['id_sts'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_sts')
            ->where('id_sts', $data['id_sts'])
            ->delete($data);
    }
}
