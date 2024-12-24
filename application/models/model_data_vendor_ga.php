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
        $this->db->select('a.*, b.komentar, c.aspek_penilaian, c.nilai, c.created_at as tgl_evaluasi');
        $this->db->from('sys_vendor a');
        $this->db->join('sys_komentar_penilaian b', 'a.id_vendor = b.id_vendor', 'left');
        $this->db->join('sys_penilaian_vendor c', 'a.id_vendor = c.id_vendor', 'left');
        $this->db->where('a.jenis_vendor', 'service');
        $this->db->where('b.id_vendor IS NOT NULL');
        $this->db->where('c.id_vendor IS NOT NULL');
        $this->db->order_by('a.id_vendor', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
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
