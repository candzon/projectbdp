<?php
    class model_data_antrian extends CI_Model{
        public function tampil_data(){
            $result = $this->db->query("SELECT * FROM sys_antrian ORDER BY id DESC;");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tampil_detail_antrian($id){
            $result = $this->db->query("SELECT * FROM sys_antrian WHERE id = '$id'");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function prioritas(){
            $result = $this->db->query("SELECT id, prioritas FROM sys_prioritas ORDER BY id");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function jenis(){
            $result = $this->db->query("SELECT id, jenis FROM sys_jenis ORDER BY id");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function pengajuan(){
            $result = $this->db->query("SELECT id, pengajuan FROM sys_pengajuan ORDER BY id");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tambah_antrian($data,$table){
            $this->db->insert($table,$data);
        }
        
        public function antrian($id){
            $result = $this->db->query("SELECT sys_antrian.id,rr,pengajuan,sys_antrian.perihal,prioritas,status_terakhir,time_stamp,pemohon,disetujui,unit_kerja,target_selesai,
            penerbitan,catatan,status,nomor_sk, sys_sk_dir.perihal,referensi_ketentuan,mencabut_ketentuan,ketentuan_pengganti,keterangan,publish 
            FROM sys_antrian 
            JOIN sys_sk_dir  ON sys_antrian.id = sys_sk_dir.id
            Where sys_antrian.id='$id'");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function antrian_revisi($id)
        {
            $result = $this->db->query("SELECT sys_antrian.id,rr,pengajuan,sys_antrian.perihal,prioritas,status_terakhir,time_stamp,pemohon,disetujui,unit_kerja,target_selesai,
            penerbitan,catatan,status,nomor_sk, sys_sk_dir.perihal,referensi_ketentuan,mencabut_ketentuan,ketentuan_pengganti,keterangan,publish 
            FROM sys_antrian 
            JOIN sys_sk_dir  ON sys_antrian.id = sys_sk_dir.id
            Where sys_antrian.id='$id'");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function status(){
            $result = $this->db->query("SELECT id, status FROM sys_status ORDER BY id");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function proses_antrian($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        public function hapus_antrian($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function jumlah_antrian(){
            $status_terakhir = 'Publish';
            $this->db->select('id');
            $this->db->from('sys_antrian');
            $this->db->where('status_terakhir!=',$status_terakhir);
            $result = $this->db->count_all_results();
         
            if($result > 0){
                return $result;
            }else{
                $result = 0;
                return $result;
            }
        }

        public function hitung(){
            $status_terakhir = 'Publish';
            $this->db->select('id');
            $this->db->from('sys_antrian');
            $this->db->where('status_terakhir=',$status_terakhir);
            $publish = $this->db->count_all_results();

            $status_terakhir = 'Publish';
            $this->db->select('id');
            $this->db->from('sys_antrian');
            $semua = $this->db->count_all_results();

            if($semua==0){
                return $semua;
            }else{
                return round($publish/$semua*100,1);
            }
            // $result = round($publish/$semua*100,1);
            // if($result > 0){
            //     return $result;
            // }else{
            //     $result = 0;
            //     return $result;
            // }
        }

        public function jumlah_sk_dir(){
            $belum_publish = 'Publish';
            $jenis = 'SK Direksi';
            $this->db->select('id');
            $this->db->from('sys_antrian');
            $this->db->where('jenis',$jenis);
            $this->db->where('status_terakhir',$belum_publish);
            $result = $this->db->count_all_results();
         
            if($result > 0){
                return $result;
            }else{
                $result = 0;
                return $result;
            }
        }

        public function jumlah_se_dir(){
            $belum_publish = 'Publish';
            $jenis = 'SE Direksi';
            $this->db->select('id');
            $this->db->from('sys_antrian');
            $this->db->where('jenis',$jenis);
            $this->db->where('status_terakhir',$belum_publish);
            $result = $this->db->count_all_results();
         
            if($result > 0){
                return $result;
            }else{
                $result = 0;
                return $result;
            }
        }

        public function jumlah_se_pbo(){
            $belum_publish = 'Publish';
            $jenis = 'SE PBO';
            $this->db->select('id');
            $this->db->from('sys_antrian');
            $this->db->where('jenis',$jenis);
            $this->db->where('status_terakhir',$belum_publish);
            $result = $this->db->count_all_results();
         
            if($result > 0){
                return $result;
            }else{
                $result = 0;
                return $result;
            }
        }

        public function cari($cari){
            $result = $this->db->query("SELECT * FROM sys_antrian 
            WHERE perihal LIKE '%$cari%'
            OR penerbitan LIKE '%$cari%'
            OR rr LIKE '%$cari%'
            OR pengajuan LIKE '%$cari%'
            OR registrasi LIKE '%$cari%'
            OR status_terakhir LIKE '%$cari%'
            ORDER BY id 
            DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function buat_kode($kode){
            $this->db->select('RIGHT(sys_antrian.id,2) as kode',FALSE);
            $this->db->order_by('id','DESC');
            $query = $this->db->get('sys_antrian');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode= intval($data->kode)+1;
            }else{
                $kode+1;
            }

            $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
            $kodejadi = "RR-".$kodemax;
            return $kodejadi;
        }

        public function cekloop($nomor_sk){
            $result = $this->db->query("SELECT * FROM sys_sk_dir 
            WHERE mencabut_ketentuan LIKE '%$nomor_sk%'
            DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }
    }
?>