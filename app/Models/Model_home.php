<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{

	public function tot_sts()
	{
		return $this->db->table('tbl_sts')->countAll();
	}

	public function tot_laporan()
	{
		return $this->db->table('tbl_sts')->countAll();
	}

	public function tot_kategori()
	{
		return $this->db->table('tbl_kategori')->countAll();
	}

	public function tot_arsip()
	{
		return $this->db->table('tbl_arsip')->countAll();
	}

	public function all_data()
	{
		return $this->db->table('tbl_sts')
			->orderBy('id_sts', 'DESC')
			->get()
			->getResultArray();
	}

	public function grafikbulan()
	{
		return $this->db->query("SELECT COUNT(tbl_sts.id_sts) AS jumlah, MONTH(tanggal) AS bulan,nama_kategori FROM 
			tbl_sts GROUP BY tbl_sts.nama_kategori")
			->getResult();
	}

	// public function filterbybulan($tahun1, $bulan1)
	// {
	// 	return $this->db->query("SELECT * FROM tbl_sts where 
	//     YEAR(tanggal) = '$tahun1' and MONTH(tanggal) = '$bulan1' ORDER BY tanggal ASC")
	// 		->getResult();
	// }

	public function getPendapatan()
	{
		return $this->db->query("SELECT SUM(jumlah_pajak) AS total FROM tbl_sts")
			->getResult();
	}

	//Grafik Total
	public function getPerbulan()
	{
		$tahun = date("Y");
		return $this->db->query("SELECT id,nama_bulan,total 
		FROM bulan LEFT JOIN ( SELECT MONTH(tanggal) as bulan, SUM(jumlah_pajak) as total 
		FROM tbl_sts WHERE YEAR(tanggal) = '$tahun'
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulan)")->getResult();
	}

	//Grafik Pajak Restoran
	public function getRestoran()
	{
		return $this->db->query("SELECT id,nama_bulan,nama_kategori,total 
		FROM bulan LEFT JOIN (SELECT MONTH(tanggal) as bulan,nama_kategori, SUM(jumlah_pajak) as total 
		FROM tbl_sts WHERE nama_kategori = 'Pajak Restoran' 
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulan)")->getResult();
	}

	//Grafik Pajak Hotel
	public function getHotel()
	{
		return $this->db->query("SELECT id,nama_bulan,nama_kategori,totalhotel 
		FROM bulan LEFT JOIN (SELECT MONTH(tanggal) as bulanhotel,nama_kategori, SUM(jumlah_pajak) as totalhotel 
		FROM tbl_sts WHERE nama_kategori = 'Pajak Hotel' 
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulanhotel)")->getResult();
	}

	//Grafik Pajak Reklame
	public function getReklame()
	{
		return $this->db->query("SELECT id,nama_bulan,nama_kategori,totalreklame 
		FROM bulan LEFT JOIN (SELECT MONTH(tanggal) as bulanreklame,nama_kategori, SUM(jumlah_pajak) as totalreklame 
		FROM tbl_sts WHERE nama_kategori = 'Pajak Reklame' 
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulanreklame)")->getResult();
	}

	//Grafik Pajak Hiburan
	public function getHiburan()
	{
		return $this->db->query("SELECT id,nama_bulan,nama_kategori,totalhiburan 
		FROM bulan LEFT JOIN (SELECT MONTH(tanggal) as bulanhiburan,nama_kategori, SUM(jumlah_pajak) as totalhiburan 
		FROM tbl_sts WHERE nama_kategori = 'Pajak Hiburan' 
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulanhiburan)")->getResult();
	}

	//Grafik Pajak PBB
	public function getPbb()
	{
		return $this->db->query("SELECT id,nama_bulan,nama_kategori,totalpbb 
		FROM bulan LEFT JOIN (SELECT MONTH(tanggal) as bulanpbb,nama_kategori, SUM(jumlah_pajak) as totalpbb 
		FROM tbl_sts WHERE nama_kategori = 'Pajak PBB' 
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulanpbb)")->getResult();
	}

	//Grafik Pajak PBB
	public function getPpj()
	{
		return $this->db->query("SELECT id,nama_bulan,nama_kategori,totalppj
		FROM bulan LEFT JOIN (SELECT MONTH(tanggal) as bulanppj,nama_kategori, SUM(jumlah_pajak) as totalppj
		FROM tbl_sts WHERE nama_kategori = 'Pajak PPJ' 
		GROUP BY MONTH(tanggal)) pnj ON (bulan.id = pnj.bulanppj)")->getResult();
	}
}
