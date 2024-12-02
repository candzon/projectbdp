<?php
class model_data_kantor extends CI_Model
{
	public function findAll()
	{
		$query = $this->db->query("SELECT * FROM sys_kantor");
		return $query->result();
	}

	public function tampil_data()
	{
		$result = $this->db->query("SELECT id_kantor, sys_alamat.nama_kantor 
            FROM sys_kantor
            INNER JOIN sys_alamat ON sys_alamat.id_alamat = sys_kantor.nama_kantor
            ORDER BY id_kantor DESC");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function tampil_header_kantor($id_kantor)
	{
		$result = $this->db->query("SELECT sys_alamat.nama_kantor 
            FROM sys_alamat 
            INNER JOIN sys_kantor ON sys_kantor.nama_kantor =  sys_alamat.id_alamat
            WHERE sys_kantor.id_kantor ='$id_kantor'
            ORDER BY id_kantor 
            DESC;");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function tampil_detail_kantor($id_kantor)
	{

		$result = $this->db->query("SELECT * FROM sys_detail_kantor WHERE id_kantor = '$id_kantor' ORDER BY id_detail_kantor DESC;");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function tambah_kantor($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_kantor($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_kantor_aksi($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_kantor($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cari($cari)
	{

		$result = $this->db->query("SELECT id_kantor, sys_alamat.nama_kantor 
            FROM sys_kantor
            INNER JOIN sys_alamat ON sys_alamat.id_alamat = sys_kantor.nama_kantor
            WHERE sys_alamat.nama_kantor 
            LIKE '%$cari%'
            ORDER BY id_kantor");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function cek($nama_kantor)
	{
		$result = $this->db->query("SELECT nama_kantor FROM sys_kantor WHERE nama_kantor = '$nama_kantor'");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}
}
