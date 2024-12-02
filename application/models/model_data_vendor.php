<?php
    Class model_data_vendor extends CI_Model{
        
        public function tampil_data(){
            $result = $this->db->query("SELECT * FROM sys_vendor_kendaraan ORDER BY id_vendor_kendaraan DESC");
            
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

        public function tambah_vendor($data,$table){
            $this->db->insert($table,$data);
        }

        public function edit_vendor($where, $table)
        {
           return $this->db->get_where($table, $where);
        }

        public function edit_vendor_aksi($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        public function hapus_vendor($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function cari($cari){
            $result = $this->db->query("SELECT * FROM sys_vendor_kendaraan 
            WHERE nama_vendor_kendaraan LIKE '%$cari%'
            ORDER BY id_vendor_kendaraan 
            DESC");

            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }

    }
?>