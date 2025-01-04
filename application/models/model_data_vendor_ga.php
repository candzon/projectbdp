<?php
class Model_data_vendor_ga extends CI_Model
{
    public function tampil_pengadaan_ga()
    {
        $result = $this->db->query("SELECT * FROM sys_vendor WHERE jenis_vendor='pengadaan' ORDER BY id_vendor DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tampil_vendor_penilaian()
    {
        $result = $this->db->query("SELECT * FROM sys_vendor WHERE jenis_vendor='service' ORDER BY id_vendor DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tampil_kategori_penilaian()
    {
        $this->db->select('k.*');
        $this->db->from('sys_kategori_penilaian k');
        $this->db->order_by('k.id_kategori');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function get_aspek_penilaian($kode_kategori)
    {
        $this->db->select('a.*, k.kode_kategori');
        $this->db->from('sys_aspek_penilaian a');
        $this->db->join('sys_kategori_penilaian k', 'a.id_kategori = k.id_kategori');
        $this->db->where('k.kode_kategori', $kode_kategori);
        $this->db->order_by('a.id_aspek_penilaian');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function simpan_penilaian_header($data)
    {
        $this->db->insert('sys_penilaian_header', $data);
        return $data['id_penilaian_header'];
    }

    public function simpan_penilaian_detail($data)
    {
        $this->db->insert_batch('sys_penilaian_detail', $data);
    }

    // public function simpan_penilaian($data_penilaian)
    // {
    //     $this->db->insert_batch('sys_penilaian', $data_penilaian);
    // }

    public function tambah_penilaian_vendor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_sys_penilaian_vendor()
    {
        $this->db->select('a.*, b.komentar, c.id_vendor, c.aspek_penilaian, c.nilai, c.created_at as tgl_evaluasi, c.kode, d.*');
        $this->db->from('sys_vendor a');
        $this->db->join('sys_komentar_penilaian b', 'a.id_vendor = b.id_vendor');
        $this->db->join('sys_penilaian_vendor c', 'a.id_vendor = c.id_vendor');
        $this->db->join('sys_pic_vendor d', 'a.id_vendor = d.id_vendor');
        $this->db->order_by('a.id_vendor', 'DESC');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function get_single_vendor($id_vendor)
    {
        $this->db->select('a.*');
        $this->db->from('sys_vendor a');
        $this->db->where('a.id_vendor', $id_vendor);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return null;
        }
    }

    public function tampil_maintenance_ga()
    {
        $this->db->select('a.*');
        $this->db->from('sys_vendor a');
        $this->db->where('a.jenis_vendor', 'service');
        $this->db->order_by('a.id_vendor', 'DESC');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
    
    public function get_penilaian_by_vendor($id_vendor) {
        $this->db->select('id_vendor, tanggal_penilaian');
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get('sys_penilaian_header');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }

    public function get_vendor_by_id($id_vendor)
    {
        return $this->db->get_where('sys_vendor', ['id_vendor' => $id_vendor])->row();
    }

    public function get_pic_join_vendor_by_id($id_vendor)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('sys_vendor a');
        $this->db->join('sys_pic_vendor b', 'a.id_vendor = b.id_vendor');
        $this->db->where('a.id_vendor', $id_vendor);

        $query = $this->db->get();
        return $query->row();
    }

    public function get_penilaian_by_vendor_and_date($id_vendor, $tanggal_penilaian)
    {
        $this->db->select('d.*, a.aspek_penilaian, h.komentar_penilaian, k.kode_kategori, k.keterangan AS kategori_keterangan');
        $this->db->from('sys_penilaian_detail d');
        $this->db->join('sys_penilaian_header h', 'd.id_penilaian_header = h.id_penilaian_header', 'inner');
        $this->db->join('sys_aspek_penilaian a', 'd.id_aspek_penilaian = a.id_aspek_penilaian', 'inner');
        $this->db->join('sys_kategori_penilaian k', 'a.id_kategori = k.id_kategori', 'inner');
        $this->db->where('h.id_vendor', $id_vendor);
        $this->db->where('h.tanggal_penilaian', $tanggal_penilaian);
        $this->db->order_by('a.id_aspek_penilaian', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_penilaian_average($id_vendor, $tanggal_penilaian)
    {
        $this->db->select('AVG(d.nilai) AS rata_rata');
        $this->db->from('sys_penilaian_detail d');
        $this->db->join('sys_penilaian_header h', 'd.id_penilaian_header = h.id_penilaian_header', 'inner');
        $this->db->where('h.id_vendor', $id_vendor);
        $this->db->where('h.tanggal_penilaian', $tanggal_penilaian);
        
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->rata_rata : null;
    }

    public function tampil_jasa_ga()
    {
        $result = $this->db->query("SELECT * FROM sys_vendor WHERE jenis_vendor='jasa' ORDER BY id_vendor DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tambah_vendor_ga($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_vendor_ga($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_vendor_ga_aksi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_karyawan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cari_pengadaan($cari)
    {
        $result = $this->db->query("SELECT * FROM sys_vendor 
            WHERE nama_vendor 
            LIKE '%$cari%'
            OR alamat 
            LIKE '%$cari%'
            OR provinsi 
            LIKE '%$cari%'
            OR no_telepon_kantor 
            LIKE '%$cari%'
            AND jenis_vendor = 'pengadaan' 
            ORDER BY id_vendor 
            DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function cari_maintenance($cari)
    {
        $result = $this->db->query("SELECT * FROM sys_vendor 
            WHERE nama_vendor 
            LIKE '%$cari%'
            OR alamat 
            LIKE '%$cari%'
            OR provinsi 
            LIKE '%$cari%'
            OR no_telepon_kantor 
            LIKE '%$cari%'
            AND jenis_vendor = 'service' 
            ORDER BY id_vendor 
            DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function cari_jasa($cari)
    {
        $result = $this->db->query("SELECT * FROM sys_vendor 
            WHERE nama_vendor 
            LIKE '%$cari%'
            OR alamat 
            LIKE '%$cari%'
            OR provinsi 
            LIKE '%$cari%'
            OR no_telepon_kantor 
            LIKE '%$cari%'
            AND jenis_vendor = 'jasa' 
            ORDER BY id_vendor 
            DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tampil_pic_pengadaan($id_vendor)
    {
        $result = $this->db->query("SELECT * FROM sys_pic_vendor WHERE id_vendor='$id_vendor' ORDER BY id_vendor DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
    public function tambah_pic_pengadaan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_pic_maintenance($id_vendor)
    {
        $result = $this->db->query("SELECT * FROM sys_pic_vendor WHERE id_vendor='$id_vendor' ORDER BY id_vendor DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tambah_pic_maintenance($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_pic_jasa($id_vendor)
    {
        $result = $this->db->query("SELECT * FROM sys_pic_vendor WHERE id_vendor='$id_vendor' ORDER BY id_vendor DESC");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tambah_pic_jasa($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_pic_pengadaan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_pic_maintenance($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_pic_pengadaan_aksi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_pic_pengadaan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
