<?php
class model_data_alamat extends CI_Model
{
	public function findAll()
	{
		$query = $this->db->get('sys_alamat');
		return $query->result();
	}
	public function getAlamatDetailAktaById($nama_kantor)
	{
		// we need nama_kantor, alamat, nama_karyawan
		$this->db->select("a.nama_kantor, b.alamat, c.nama_karyawan");
		$this->db->from("sys_detail_akta as a");
		$this->db->join("sys_alamat as b", "a.nama_kantor = b.nama_kantor", "left");
		$this->db->join("sys_karyawan as c", "a.nama_kantor = c.lokasi", "left");
		$this->db->where("a.nama_kantor", $nama_kantor);

		// get first row
		return $this->db->get()->row();
	}

	public function getAlamatDetailPbbById($nama_kantor)
	{
		$this->db->select('*');
		$this->db->from('sys_alamat');
		$this->db->where('nama_kantor', $nama_kantor);

		// get first row
		return $this->db->get()->row();
	}

	public function tampil_data()
	{
		$result = $this->db->query("SELECT * FROM sys_alamat ORDER BY id_alamat
            ");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function tambah_alamat($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_alamat($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_alamat_aksi($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_alamat($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cari($cari)
	{
		$result = $this->db->query("SELECT * FROM sys_alamat 
            WHERE nama_kantor LIKE '%$cari%'
            ORDER BY id_alamat 
            DESC");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}
}
