<?php
class Model_data_karyawan extends CI_Model
{

	public function findAll()
	{
		$this->db->select('*');
		$this->db->from('sys_karyawan');
		return $this->db->get()->result();
	}

	public function tampil_data()
	{
		$result = $this->db->query("SELECT * FROM sys_karyawan ORDER BY id_karyawan DESC");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function tambah_karyawan($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_karyawan($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_karyawan_aksi($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_karyawan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cari($cari)
	{
		$result = $this->db->query("SELECT * FROM sys_karyawan 
            WHERE nik = '$cari' 
            OR nama_karyawan 
            LIKE '%$cari%'
            ORDER BY id_karyawan 
            DESC");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}
}
