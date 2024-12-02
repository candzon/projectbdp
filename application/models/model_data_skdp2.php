<?php
    class Model_data_skdp2 extends CI_Model{
        public function tampil_data(){
            $result = $this->db->query("SELECT * FROM sys_management1 ORDER BY id DESC");
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
        }
    }
?>