<?php
class Model_data_pbb extends CI_Model
{
	public function get_pbb()
	{
		$this->db->select('*');
		$this->db->from('sys_pbb');
		$this->db->join('sys_alamat', 'sys_pbb.nama_kantor = sys_alamat.nama_kantor');
		return $this->db->get()->result();
	}

	public function get_detail_pbb($id)
	{
		$this->db->select('a.*, sys_akun.nama AS deleted_by_user');
		$this->db->from('sys_detail_pbb as a');
		$this->db->join('sys_akun', 'sys_akun.id = a.deleted_by', 'left');
		$this->db->where('id_pbb', $id);
		$this->db->order_by('a.id', 'DESC');
		return $this->db->get()->result();
	}

	public function tampil_data()
	{
		// Ganti 'id' dengan kolom yang ada di sys_pbb
		$result = $this->db->query("SELECT * FROM sys_pbb ORDER BY id DESC");  // Ganti tanggal_pembayaran dengan kolom yang benar
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}


	public function tambah_pbb($data)
	{
		// check if nama_kantor exists
		$nama_kantor = $data['nama_kantor'];
		$check = $this->db->get_where('sys_pbb', ['nama_kantor' => $nama_kantor])->row();

		if ($check) {
			// return FALSE if nama_kantor exists
			return FALSE;
		} else {
			$this->db->insert('sys_pbb', $data);
			return TRUE;
		}
	}

	public function tambah_detail_pbb($id_pbb, $data)
	{
		$data['id_pbb'] = $id_pbb;
		$this->db->insert('sys_detail_pbb', $data);
	}

	public function edit_detail_pbb($id, $data)
	{
		// check if id exists
		$check = $this->db->get_where('sys_detail_pbb', ['id' => $id])->row();

		if ($check) {
			$this->db->where('id', $id);
			$this->db->update('sys_detail_pbb', $data);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_pbb_by_id($id)
	{
		return $this->db->get_where('pbb', ['id' => $id])->row();
	}

	public function update_pbb($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('pbb', $data);
	}

	public function hapus_detail_pbb($where)
	{
		// soft delete
		$data = [
			'deleted_at' => date('Y-m-d H:i:s'),
			'deleted_by' => $this->session->userdata('id')
		];
		$this->db->where($where);
		$this->db->update('sys_detail_pbb', $data);
	}

	public function upload_dokumen($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('sys_detail_pbb', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
