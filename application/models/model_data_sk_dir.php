<?php
    class model_data_sk_dir extends CI_Model{
        public function tampil_data(){
            $result = $this->db->query("SELECT sys_antrian.id,sys_antrian.perihal,
            status,nomor_sk,sys_sk_dir.perihal,referensi_ketentuan,
            mencabut_ketentuan,ketentuan_pengganti,
            catatan,publish 
            FROM sys_antrian 
            JOIN sys_sk_dir  ON sys_antrian.id = sys_sk_dir.id
            Where sys_antrian.status_terakhir='Publish' AND sys_sk_dir.jenis ='SK Direksi'
            ORDER BY sys_sk_dir.id DESC");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function sk_dir_rev(){
            $result = $this->db->query("SELECT nomor_sk, catatan 
            FROM sys_sk_dir 
            JOIN sys_antrian ON sys_antrian.id = sys_sk_dir.id
            -- Where sys_antrian.status_terakhir='Publish'
            ");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tambah_sk_dir($data,$table){
            $this->db->insert($table,$data);
        }

        public function hapus_sk_dir($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function proses_sk_dir($where, $data2, $table)
        {
            $this->db->where($where);
            $this->db->update($table,$data2);
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
            AND status LIKE '%$cari%' AND sys_sk_dir.jenis ='SK Direksi') 
            OR  (sys_antrian.status_terakhir='Publish'
            AND nomor_sk LIKE'%$cari%' AND sys_sk_dir.jenis ='SK Direksi') 
            OR  (sys_antrian.status_terakhir='Publish'
            AND publish LIKE '%$cari%' AND sys_sk_dir.jenis ='SK Direksi')
            OR  (sys_antrian.status_terakhir='Publish'
            AND sys_sk_dir.perihal LIKE '%$cari%' AND sys_sk_dir.jenis ='SK Direksi') 
            OR  (sys_antrian.status_terakhir='Publish'
            AND mencabut_ketentuan LIKE '%$cari%' AND sys_sk_dir.jenis ='SK Direksi') 
            OR  (sys_antrian.status_terakhir='Publish'
            AND referensi_ketentuan LIKE '%$cari%' AND sys_sk_dir.jenis ='SK Direksi')
            OR  (sys_antrian.status_terakhir='Publish'
            AND mencabut_ketentuan LIKE '%$cari%' AND sys_sk_dir.jenis ='SK Direksi')
            ORDER BY sys_sk_dir.id DESC"
            );

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function flag($mencabut_ketentuan)
        {
            $result = $this->db->query("SELECT nomor_sk FROM sys_sk_dir WHERE nomor_sk = '$mencabut_ketentuan'
            ORDER BY sys_sk_dir.id DESC");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }
    }
?>