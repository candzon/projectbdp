<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Detail_Skdp extends CI_Model {
    public function tampil_detail_skdp($id_detail_skdp) {
        // Menyusun query untuk mengambil data dari sys_detail_skdp dan sys_skdp
        $this->db->select('sys_detail_skdp.id_detail_skdp, sys_detail_skdp.nomor_skdp, sys_skdp.nama_kantor, sys_detail_skdp.alamat_kantor, sys_detail_skdp.nama_kepala_kantor, sys_detail_skdp.masa_berlaku');
        $this->db->from('sys_detail_skdp');
        $this->db->join('sys_skdp', 'sys_skdp.id = sys_detail_skdp.id_skdp');
        $this->db->where('sys_skdp.id', $id_detail_skdp); // Menggunakan id_skdp sebagai filter
        $this->db->order_by('sys_detail_skdp.id_detail_skdp', 'DESC');

        $query = $this->db->get(); // Menjalankan query

        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil sebagai array objek
        } else {
            return FALSE; // Mengembalikan FALSE jika tidak ada hasil
        }
    }

    public function tampil_skdp() {
        $result = $this->db->query("SELECT id_skdp, nama_skdp FROM sys_skdp ORDER BY id_skdp");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function tambah_detail_skdp($data, $table) {
        $this->db->insert($table, $data);
    }

    public function harga_sewa($id_skdp) {
        $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa FROM sys_detail_skdp WHERE id_skdp = '$id_skdp'");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function edit_detail_skdp($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function edit_detail_skdp_aksi($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_skdp($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cari($cari) {
        $result = $this->db->query("
            SELECT 
                id_detail_skdp, 
                sys_skdp.nama_skdp, 
                mobil, 
                plat_nomor, 
                tahun, 
                sys_vendor_kendaraan.nama_vendor_kendaraan, 
                harga_sewa, 
                periode_awal, 
                periode_akhir, 
                catatan 
            FROM 
                sys_detail_skdp
            INNER JOIN 
                sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_skdp.nama_vendor_kendaraan 
            INNER JOIN 
                sys_skdp ON sys_skdp.id_skdp = sys_detail_skdp.pengguna 
            WHERE 
                plat_nomor = '$cari'
            ORDER BY 
                id_detail_skdp DESC
        ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function sewa_kendaraan() {
        $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa FROM sys_detail_skdp");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function harga_sewa_detail($cari) {
        $result = $this->db->query("
            SELECT SUM(harga_sewa) AS harga_sewa
            FROM sys_detail_skdp
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_skdp.nama_vendor_kendaraan 
            INNER JOIN sys_skdp ON sys_skdp.id_skdp = sys_detail_skdp.pengguna 
            WHERE plat_nomor = '$cari'
            ORDER BY id_detail_skdp DESC
        ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
}

class DataModel extends CI_Model {
    public function get_data_between_dates($periode_awal, $periode_akhir) {
        $this->db->where('masa_berlaku >=', $periode_awal);
        $this->db->where('masa_berlaku <=', $periode_akhir);
        $query = $this->db->get('nama_tabel'); // Ganti dengan nama tabel yang sesuai
        return $query->result();
    }
}
?>
