<?php 
    class Data_se_dir extends CI_Controller{
        
        public function tampil_data(){
            $data['data']=$this->model_data_se_dir->tampil_data();

            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/data_se_dir',$data);
            $this->load->view('templates_user/footer');
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_se_dir->cari($cari);
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/hasil_pencarian_se_dir', $data);
            $this->load->view('templates_user/footer');
        }
    }
?>