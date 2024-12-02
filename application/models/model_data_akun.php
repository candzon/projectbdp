<?php
    class model_data_akun extends CI_Model{
        // public function hitung_data(){
        //     $data = $this->db->count_all('sys_akun');
        //     echo $data ;die;
        // }

        public function tampil_data(){
            

            $result = $this->db->query("SELECT * FROM sys_akun ORDER BY id DESC");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tambah_akun($data,$table){
            $this->db->insert($table,$data);
        }

        public function edit_akun($where, $table)
        {
           return $this->db->get_where($table, $where);
        }

        public function edit_akun_aksi($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        public function edit_password_aksi($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        public function hapus_akun($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function jumlah_akun(){
            
            $level = 'building';
            $this->db->select('id');
            $this->db->from('sys_akun');
            $this->db->where('level',$level);
            $result = $this->db->count_all_results();
            if($result > 0){
                return $result;
            }else{
                return 0;
            }
        }

        public function cari($cari){
            $result = $this->db->query("SELECT * FROM sys_akun 
            WHERE nama_akun LIKE '%$cari%' OR nama LIKE '%$cari%'
            ORDER BY id 
            DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

    }
?>