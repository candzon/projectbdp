<?php
    class model_data_se_pbo extends CI_Model{
        public function tampil_data(){
            $result = $this->db->query("SELECT sys_antrian.id,sys_antrian.perihal,
            status,nomor_sk,sys_sk_dir.perihal,referensi_ketentuan,
            mencabut_ketentuan,ketentuan_pengganti,
            catatan,publish 
            FROM sys_antrian 
            JOIN sys_sk_dir  ON sys_antrian.id = sys_sk_dir.id
            Where sys_antrian.status_terakhir='Publish' AND sys_sk_dir.jenis ='SE PBO'
            ORDER BY sys_sk_dir.id DESC");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function cari($cari){
            $result = $this->db->query(
                "SELECT sys_antrian.id,sys_antrian.perihal,
                status,nomor_sk,sys_sk_dir.perihal,referensi_ketentuan,
                mencabut_ketentuan,ketentuan_pengganti,
                keterangan,publish 
                FROM sys_antrian 
                JOIN sys_sk_dir  ON sys_antrian.id = sys_sk_dir.id
                Where (sys_antrian.status_terakhir='Publish'
                AND status LIKE '%$cari%' AND sys_sk_dir.jenis ='SE PBO') 
                OR  (sys_antrian.status_terakhir='Publish'
                AND nomor_sk LIKE'%$cari%' AND sys_sk_dir.jenis ='SE PBO') 
                OR  (sys_antrian.status_terakhir='Publish'
                AND publish LIKE'%$cari%' AND sys_sk_dir.jenis ='SE PBO') 
                OR  (sys_antrian.status_terakhir='Publish'
                AND sys_sk_dir.perihal LIKE '%$cari%' AND sys_sk_dir.jenis ='SE PBO') 
                OR  (sys_antrian.status_terakhir='Publish'
                AND mencabut_ketentuan LIKE '%$cari%' AND sys_sk_dir.jenis ='SE PBO') 
                OR  (sys_antrian.status_terakhir='Publish'
                AND referensi_ketentuan LIKE '%$cari%' AND sys_sk_dir.jenis ='SE PBO')
                OR  (sys_antrian.status_terakhir='Publish'
                AND mencabut_ketentuan LIKE '%$cari%' AND sys_sk_dir.jenis ='SE PBO ')
                ORDER BY sys_sk_dir.id DESC"
            );

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }
    }
?>