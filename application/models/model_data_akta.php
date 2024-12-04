<?php
class Model_data_akta extends CI_Model
{
	public function get_akta()
	{
		$this->db->select('*');
		$this->db->from('sys_akta');
		return $this->db->get()->result();
	}

	public function get_detail_akta($id)
	{
		$this->db->select('*, sys_akun.nama AS deleted_by_user, c.*');
		$this->db->from('sys_detail_akta');
		$this->db->join('sys_akun', 'sys_akun.id = sys_detail_akta.deleted_by', 'left');
		$this->db->join('sys_alamat c', 'c.nama_kantor = sys_detail_akta.nama_kantor');
		$this->db->where('id_akta', $id);
		$this->db->order_by('id_detail_akta', 'DESC');
		return $this->db->get()->result();
	}

	public function get_collapse()
	{
		$this->db->select('*, sys_akun.nama AS deleted_by_user, c.*');
		$this->db->from('sys_detail_akta');
		$this->db->join('sys_akun', 'sys_akun.id = sys_detail_akta.deleted_by', 'left');
		$this->db->join('sys_alamat c', 'c.nama_kantor = sys_detail_akta.nama_kantor');
		$this->db->order_by('id_detail_akta', 'DESC');
		return $this->db->get()->result();
	}

	public function get_akta_by_nama_kantor($nama_kantor)
	{
		$this->db->select('*');
		$this->db->from('sys_akta');
		$this->db->where('nama_kantor', $nama_kantor);
		return $this->db->get()->row();
	}

	public function upload_dokumen($id_detail_akta, $data)
	{
		// update dokumen_path to sys_detail_akta
		// get detail akta by id
		$detail_akta = $this->db->get_where('sys_detail_akta', ['id_detail_akta' => $id_detail_akta])->row();
		$akta = $this->upload_dokumen_akta($detail_akta->id_akta, $data);
		if (!$akta) {
			return FALSE;
		}
		$data['dokumen_uploaded_at'] = date('Y-m-d H:i:s');
		// upload dokumen
		$this->db->where('id_detail_akta', $id_detail_akta);
		$this->db->update('sys_detail_akta', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function upload_dokumen_akta($id, $data)
	{
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		$this->db->update('sys_akta', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tampil_data()
	{
		$result = $this->db->query("SELECT * FROM sys_akta ORDER BY id DESC");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function sum_harga_sewa($id_akta)
	{
		$result = $this->db->query("SELECT SUM(harga_sewa) as total_harga_sewa FROM sys_detail_akta WHERE id_akta = '$id_akta' AND deleted_at IS NULL");
		// get first row
		$row = $result->row();
		return $row->total_harga_sewa;
	}


	public function tambah_akta($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_detail_akta($id, $data)
	{
		// check if exist
		$detail_akta = $this->db->get_where('sys_detail_akta', ['id_detail_akta' => $id])->row();
		if (!$detail_akta) {
			return FALSE;
		}
		$this->db->where('id_detail_akta', $id);
		$this->db->update('sys_detail_akta', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_akta_aksi($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}


	public function get_akta_by_id($id)
	{
		return $this->db->get_where('akta', ['id' => $id])->row();
	}

	public function update_akta($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('akta', $data);
	}


	public function tampil_detail_akta($id_detail_akta)
	{
		$result = $this->db->query("SELECT * FROM sys_detail_akta WHERE id = '$id_detail_akta' ORDER BY id_detail_akta DESC;");
		return ($result->num_rows() > 0) ? $result->result() : FALSE;
	}

	public function tampil_header_akta($id)
	{
		$result = $this->db->query("SELECT sys_kantor.nama_kantor 
            FROM sys_kantor
            INNER JOIN sys_akta ON sys_akta.nama_kantor =  sys_kantor.id_kantor
            WHERE sys_akta.id_akta ='$id'
            ORDER BY id
            DESC;");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function tampil_akta($id)
	{

		$result = $this->db->query("SELECT * FROM sys_akta WHERE id = '$id' ORDER BY id_akta DESC;");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return FALSE;
		}
	}

	public function hapus_detail_akta($where)
	{
		$this->db->where($where);
		$this->db->update('sys_detail_akta', ['deleted_at' => date('Y-m-d H:i:s'), 'deleted_by' => $this->session->userdata('id')]);
	}
}
