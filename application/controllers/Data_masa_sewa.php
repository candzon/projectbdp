<?php 
    class Data_masa_sewa extends CI_Controller{
        public function tampil_masa_sewa(){
            $data['data']=$this->model_data_masa_sewa->tampil_data();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_masa_sewa',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tampil_masa_sewa_building(){
            $data['data']=$this->model_data_masa_sewa->tampil_data();
            
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('admin/data_masa_sewa_building',$data);
            $this->load->view('templates_user/footer');
        }
    }
?>