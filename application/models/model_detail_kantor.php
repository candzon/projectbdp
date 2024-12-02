<?php
    class model_detail_kantor extends CI_Model{
        public function tampil_detail_kantor($id_kantor){
            $result = $this->db->query("SELECT id_detail_kantor, sys_karyawan.nama_karyawan, mobil, plat_nomor, tahun, sys_vendor_kendaraan.nama_vendor_kendaraan, harga_sewa, periode_awal, periode_akhir, catatan 
            FROM sys_detail_kantor
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE id_kantor = '$id_kantor'
            ORDER BY id_detail_kantor DESC");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tampil_karyawan(){
            $result = $this->db->query("SELECT id_karyawan, nama_karyawan FROM sys_karyawan ORDER BY id_karyawan");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tampil_vendor_kendaraan(){
            $result = $this->db->query("SELECT id_vendor_kendaraan, nama_vendor_kendaraan FROM sys_vendor_kendaraan ORDER BY id_vendor_kendaraan");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tambah_detail_kantor($data,$table){
            $this->db->insert($table,$data);
        }

        public function harga_sewa($id_kantor){
            $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa FROM sys_detail_kantor WHERE id_kantor = '$id_kantor'");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function edit_detail_kantor($where, $table)
        {
           return $this->db->get_where($table, $where);
        }

        public function edit_detail_kantor_aksi($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        public function hapus_detail_kantor($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function cari($cari){
            $result = $this->db->query("SELECT id_detail_kantor, sys_karyawan.nama_karyawan, mobil, plat_nomor, tahun, sys_vendor_kendaraan.nama_vendor_kendaraan, harga_sewa, periode_awal, periode_akhir, catatan 
            FROM sys_detail_kantor
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE plat_nomor = '$cari'
            ORDER BY id_detail_kantor 
            DESC");
           
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function sewa_kendaraan(){
            $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa FROM sys_detail_kantor");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function harga_sewa_detail($cari){
            $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa
            FROM sys_detail_kantor
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE plat_nomor = '$cari'
            ORDER BY id_detail_kantor 
            DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
            
        }
    }
?>