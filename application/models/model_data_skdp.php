<?php
class Model_data_skdp extends CI_Model
{

	public function tampil_data($collapse_id = null)
	{
		// $result = $this->db->query("SELECT * FROM sys_detail_skdp  ORDER BY id_detail_skdp DESC ");
		$this->db->select('a.*, b.nama AS deleted_by_user, c.*')
			->from('sys_detail_skdp a')
			->join('sys_akun b', 'b.id = a.deleted_by', 'left')
			->join('sys_alamat c', 'c.nama_kantor = a.nama_kantor')
			->order_by('id_detail_skdp', 'DESC');
		return $this->db->get()->result();
	}


	public function cek_dokumen_period()
	{
		$this->db->select('a.*, b.nama AS deleted_by_user, c.*')
			->from('sys_detail_skdp a')
			->join('sys_akun b', 'b.id = a.deleted_by', 'left')
			->join('sys_alamat c', 'c.nama_kantor = a.nama_kantor')
			->where('a.periode_akhir >=', date('Y-m-d'))
			->where('a.periode_akhir <=', date('Y-m-d', strtotime('+3 month')))
			->order_by('id_detail_skdp', 'DESC');

		return $this->db->get()->result();
	}

	public function count_period()
	{
		$this->db->select('a.*, b.nama AS deleted_by_user, c.*')
			->from('sys_detail_skdp a')
			->join('sys_akun b', 'b.id = a.deleted_by', 'left')
			->join('sys_alamat c', 'c.nama_kantor = a.nama_kantor')
			->where('a.periode_akhir >=', date('Y-m-d'))
			->where('a.periode_akhir <=', date('Y-m-d', strtotime('+3 month')))
			->where('a.deleted_at IS NULL')
			->order_by('id_detail_skdp', 'DESC');

		return $this->db->get()->result();
	}

	public function tampil_deleted_data($id_detail_skdp)
	{
		$this->db->select('sys_detail_skdp.*, sys_akun.nama AS deleted_by_user')
			->from('sys_detail_skdp')
			->join('sys_akun', 'sys_akun.id = sys_detail_skdp.deleted_by', 'left')
			->where('sys_detail_skdp.deleted_at IS NOT NULL')
			->where('sys_detail_skdp.id_detail_skdp', $id_detail_skdp)
			->order_by('id_detail_skdp', 'DESC');
		return $this->db->get()->result();
	}

	public function tambah_skdp($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_skdp($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function upload_dokumen($id, $data)
	{
		$this->db->where('id_detail_skdp', $id);
		$this->db->update('sys_detail_skdp', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_skdp($id_detail_skdp)
	{
		$result = $this->db->select('sys_detail_skdp.*, sys_kantor.nama_kantor')
			->from('sys_detail_skdp')
			->join('sys_kantor', 'sys_kantor.id_kantor = sys_detail_skdp.nama_kantor')
			->where('id_detail_skdp', $id_detail_skdp)
			->get();

		return ($result->num_rows() > 0) ? $result->row() : FALSE;
	}

	public function get_skdp_by_id($id_detail_skdp)
	{
		return $this->db->get_where('skdp', ['id' => $id_detail_skdp])->row();
	}

	public function update_skdp($id_detail_skdp, $data)
	{
		$this->db->where('id', $id_detail_skdp);
		$this->db->update('skdp', $data);
	}

	public function tampil_header_skdp($id_detail_skdp)
	{
		$result = $this->db->query("SELECT sys_kantor.nama_kantor 
            FROM sys_kantor
            INNER JOIN sys_skdp ON sys_skdp.nama_kantor = sys_kantor.id_kantor
            WHERE sys_skdp.id_skdp = '$id_detail_skdp'
            ORDER BY id DESC;");

		return ($result->num_rows() > 0) ? $result->result() : FALSE;
	}

	public function hapus_skdp($where, $table)
	{
		$this->db->where($where);
		// soft delete
		$this->db->update($table, ['deleted_at' => date('Y-m-d H:i:s'), 'deleted_by' => $this->session->userdata('id')]);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tampil_detail_skdp($id_detail_skdp)
	{
		$result = $this->db->query("SELECT * FROM sys_detail_skdp WHERE id = '$id_detail_skdp' ORDER BY id_detail_skdp DESC;");
		return ($result->num_rows() > 0) ? $result->result() : FALSE;
	}

	public function getAlamatAndkantor()
	{
		$result = $this->db->query("SELECT * FROM sys_alamat");
		return $result->result();
	}

	public function getHeadKantor()
	{
		$result = $this->db->query("SELECT * FROM sys_karyawan");
		return $result->result();
	}

	public function getKantor($namaKantor)
	{
		// join sys detail skdp as dskdp dengan sys alamat as sa dengan dskdp.nama_kantor = sa.nama_kantor
		$result = $this->db->query("SELECT 
			 sys_alamat.nama_kantor, sys_alamat.alamat,  sys_karyawan.nama_karyawan
		 FROM sys_detail_skdp AS sd
			JOIN sys_alamat ON sd.nama_kantor = sys_alamat.nama_kantor
			LEFT JOIN sys_karyawan ON sd.nama_kantor = sys_karyawan.lokasi
		WHERE sd.nama_kantor = '$namaKantor'
		");

		return $result->row();
	}
}
