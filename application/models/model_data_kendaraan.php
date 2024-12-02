<?php
    class Model_data_kendaraan extends CI_Model{
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

        public function tampil_data(){
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

        public function tampil_data_kendaraan(){
            $result = $this->db->query("SELECT id_detail_kantor,sys_alamat.nama_kantor, sys_karyawan.nama_karyawan,sys_karyawan.divisi,sys_karyawan.departemen, mobil, plat_nomor, tahun, sys_vendor_kendaraan.nama_vendor_kendaraan, harga_sewa, periode_awal, periode_akhir, catatan,
            DATEDIFF(periode_akhir, CURDATE())/30 AS month 
            FROM sys_detail_kantor 
            INNER JOIN sys_alamat ON sys_alamat.id_alamat = sys_detail_kantor.id_kantor
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            ORDER BY sys_alamat.nama_kantor ASC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function cari($cari){
            $result = $this->db->query("SELECT id_detail_kantor,sys_alamat.nama_kantor, sys_karyawan.nama_karyawan,sys_karyawan.divisi,sys_karyawan.departemen, mobil, plat_nomor, tahun, sys_vendor_kendaraan.nama_vendor_kendaraan, harga_sewa, periode_awal, periode_akhir, catatan 
            FROM sys_detail_kantor 
            INNER JOIN sys_alamat ON sys_alamat.id_alamat = sys_detail_kantor.id_kantor
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE nama_kantor ='$cari'
            OR divisi = '$cari' 
            OR departemen = '$cari'
            OR nama_karyawan LIKE '%$cari%'
            OR plat_nomor LIKE '%$cari%'
            OR catatan LIKE '%$cari%'
            OR sys_vendor_kendaraan.nama_vendor_kendaraan = '$cari'
            ORDER BY id_detail_kantor DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function harga_sewa($cari){
           
            $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa
            FROM sys_detail_kantor 
            INNER JOIN sys_alamat ON sys_alamat.id_alamat = sys_detail_kantor.id_kantor
            INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE nama_kantor ='$cari'
            OR divisi = '$cari' 
            OR departemen = '$cari'
            OR nama_karyawan = '$cari'
            OR plat_nomor LIKE '%$cari%'
            OR catatan LIKE '%$cari%'
            OR sys_vendor_kendaraan.nama_vendor_kendaraan = '$cari'
            ORDER BY id_detail_kantor DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }
    }
?>